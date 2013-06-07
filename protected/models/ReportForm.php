<?php
class ReportForm extends CFormModel {
	public $start;
	public $end;
	public function rules() {
		return array (
				// name, email, subject and body are required
				array (
						'start, end',
						'required' 
				) 
		);
	}
}