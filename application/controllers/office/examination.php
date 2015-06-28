<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examination extends CI_Controller {

    public function __construct () {
        parent::__construct();
        
	// clear cache
	header ( "Cache-Control: no-cache, must-revalidate");
	header ( "Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    }
    
    
    private function _showMenu ( $aData = array () ) {
        $this->load->model ( "section_model", "mSection" );
        
        $aData['allSections'] = $this->mSection->getAll();
        
        return $aData;
    }
    
    public function manage ( $sectionAlias, $levelID = 0 ) {
        $aData = $this->_showMenu();
        
        $this->load->model ( "section_model", "mSection" );
        $this->load->model ( "question_model", "mQuestion" );
        $this->load->model ( "examination_level_model", "mExamLevel" );
        
	$this->load->helper ( "form" );
	
        // get section by section alias
        $section = $this->mSection->getByAlias ( $sectionAlias );
        
        // if not found this section alais, redirect to main page
        if ( $section == null ) return redirect ();
        
        $levels = $this->mExamLevel->getBySection ( $section->id );
        
        if ( $levelID == 0 ) {
            if ( count($levels) > 0 ) {
                $levelID = $levels[0]->id;
            } else {
                return redirect();
            }
        }
        
        
        // check matching between level id and section id        
        if ( $this->mExamLevel->checkLevelForSection ( $levelID, $section->id) == false ) return redirect();
        
        
        // get list of questions
        $questions = $this->mQuestion->getBySection ( $section->id, $levelID );
        
        
        
        $aData['section'] = $section;
        $aData['menu_' . $sectionAlias] = true;
        $aData['menu_exam_' . $sectionAlias] = true;
        $aData['questions'] = $questions;
        $aData['levels'] = $levels;
        $aData['levelID'] = $levelID;
        $aData['level'] = $this->mExamLevel->getByID ( $levelID );
        
        $this->load->view ( "admin/examination/manage", $aData );
    }
    
    public function formQuestion ( $sectionAlias, $levelID, $questionID = 0 ) {
        $aData = $this->_showMenu();
        
        $this->load->model ( "section_model", "mSection" );
        $this->load->model ( "question_model", "mQuestion" );
        $this->load->model ( "answer_model", "mAnswer" );
        $this->load->model ( "examination_level_model", "mExamLevel" );
        
        $this->load->helper ( "form" );
        
        // get section by section alias
        $section = $this->mSection->getByAlias ( $sectionAlias );
        
        // if not found this section alias, redirect to main page
        if ( $section == null ) return redirect ();
        

        // check matching between level id and section id        
        if ( $this->mExamLevel->checkLevelForSection ( $levelID, $section->id) == false ) return redirect();
        
        $question = null;
        $choices = array();
        
        // if questionID != 0, it was an edit mode
        if ( $questionID != 0 ) {
            // then, get question by id
            $question = $this->mQuestion->getByID ( $questionID );
           
           // if question == null, means that the id was wrong
            if ( $question == null || $question->examination_level != $levelID)  return redirect ( "office/question/manage/" . $sectionAlias);
            
            $choices = $this->mAnswer->getByQuestion ( $question->id );
        }
        
        if ( $_SERVER["REQUEST_METHOD"] === "POST" ) {
            $this->load->library ( "form_validation" );
            
            $this->form_validation->set_rules ( "question", "คำถาม", "trim|required" );
            $this->form_validation->set_rules ( "answer1", "คำตอบ 1", "trim|required" );
            $this->form_validation->set_rules ( "answer2", "คำตอบ 2", "trim|required" );
            $this->form_validation->set_rules ( "answer3", "คำตอบ 3", "trim|required" );
            $this->form_validation->set_rules ( "answer4", "คำตอบ 4", "trim|required" );
            $this->form_validation->set_rules ( "fix_position_1", "Fix ตำแหน่งตัวเลือกคำตอบที่ 1", "trim" );
            $this->form_validation->set_rules ( "fix_position_2", "Fix ตำแหน่งตัวเลือกคำตอบที่ 2", "trim" );
            $this->form_validation->set_rules ( "fix_position_3", "Fix ตำแหน่งตัวเลือกคำตอบที่ 3", "trim" );
            $this->form_validation->set_rules ( "fix_position_4", "Fix ตำแหน่งตัวเลือกคำตอบที่ 4", "trim" );
            $this->form_validation->set_rules ( "right_answer", "คำตอบที่ถูกต้อง", "trim|required|greater_than[0]|less_than[5]" );
            $this->form_validation->set_error_delimiters('<div class="error">* ', '</div>');
            
            if ( $this->form_validation->run() === false ) {
            } else {
                
                $this->db->trans_begin();
                
                $this->mQuestion->id = $questionID;
                $this->mQuestion->section = $section->id;
                $this->mQuestion->question = $this->input->post ( "question" );
                $this->mQuestion->examination_level = $levelID;
                $question = $this->mQuestion->save();
                
                $answer1 = null;
                $answer2 = null;
                $answer3 = null;
                $answer4 = null;
                
                if ( $question != null ) {
                        if ( count($choices) > 0 ) $answer1 = $choices[0];
                        if ( count($choices) > 1 ) $answer2 = $choices[1];
                        if ( count($choices) > 2 ) $answer3 = $choices[2];
                        if ( count($choices) > 3 ) $answer4 = $choices[3];
                }
                
                $this->mAnswer->id = $answer1 == null? 0: $answer1->id;
                $this->mAnswer->question = $question->id;
                $this->mAnswer->answer = $this->input->post ( "answer1" );
                $this->mAnswer->is_right = $this->input->post ( "right_answer") == 1? 1: 0;
                $this->mAnswer->is_fix_position = $this->input->post ( "fix_position_1" );
                $this->mAnswer->save();
                
                $this->mAnswer->id = $answer2 == null? 0: $answer2->id;
                $this->mAnswer->question = $question->id;
                $this->mAnswer->answer = $this->input->post ( "answer2" );
                $this->mAnswer->is_right = $this->input->post ( "right_answer") == 2? 1: 0;
                $this->mAnswer->is_fix_position = $this->input->post ( "fix_position_2" );
                $this->mAnswer->save();
                
                $this->mAnswer->id = $answer3 == null? 0: $answer3->id;
                $this->mAnswer->question = $question->id;
                $this->mAnswer->answer = $this->input->post ( "answer3" );
                $this->mAnswer->is_right = $this->input->post ( "right_answer") == 3? 1: 0;
                $this->mAnswer->is_fix_position = $this->input->post ( "fix_position_3" );
                $this->mAnswer->save();
                
                $this->mAnswer->id = $answer4 == null? 0: $answer4->id;
                $this->mAnswer->question = $question->id;
                $this->mAnswer->answer = $this->input->post ( "answer4" );
                $this->mAnswer->is_right = $this->input->post ( "right_answer") == 4? 1: 0;
                $this->mAnswer->is_fix_position = $this->input->post ( "fix_position_4" );
                $this->mAnswer->save();
                
                if ($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                } else {
                    $this->db->trans_commit();
                }
                
                return redirect ( "office/examination/manage/" . $section->alias . "/" . $levelID . "?action=" . ($questionID == 0? "add": "edit"));
            }
        }
        
        $aData['section'] = $section;
        $aData['menu_' . $sectionAlias] = true;
        $aData['menu_exam_' . $sectionAlias] = true;
        $aData['question'] = $question;
        $aData['choices'] = $choices;
        $aData['levelID'] = $levelID;
        $aData['level'] = $this->mExamLevel->getByID ( $levelID );
        
        $this->load->view ( "admin/examination/form_question", $aData );
    }
    
    public function disableQuestion ( $sectionAlias, $levelID)  {
	$this->load->model ( "section_model", "mSection" );
        $this->load->model ( "question_model", "mQuestion" );
        $this->load->model ( "examination_level_model", "mExamLevel" );
        
        $this->load->helper ( "form" );
        
	if ( $_SERVER["REQUEST_METHOD"] !== "POST" || !array_key_exists("question_id", $_POST)) {
	    return redirect ( "office/manage/" . $sectionAlias . "/" . $levelID);
	}
	
        // get section by section alias
        $section = $this->mSection->getByAlias ( $sectionAlias );
        
        // if not found this section alias, redirect to main page
        if ( $section == null ) return redirect ();
        

        // check matching between level id and section id        
        if ( $this->mExamLevel->checkLevelForSection ( $levelID, $section->id) == false ) return redirect();
	
	
	// check the question_id was right
	$question = $this->mQuestion->getByID ( $this->input->post ( "question_id" ));
	
	if ( $question == null ) {
	    return redirect ( "office/manage/" . $sectionAlias . "/" . $levelID);
	}
	
	
	// disable the question by question id
	$this->mQuestion->disable ( $question->id );
	
	return redirect ( "office/examination/manage/" . $sectionAlias . "/" . $levelID . "?action=delete");
    }
}