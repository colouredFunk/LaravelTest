<?php 

class AccountController extends BaseController {
    
    public function getCreate() {
        //viewing form
        return View::make('account.create');
        
    }
    public function postCreate() {
        //submitting form
        $validator = Validator::make(Input::all(), 
                array(
                    'fName' => 'required',
                    'status' => 'required|in:1,2,3'
                )
        );
        if($validator->fails()) {
            return Response::json([
                'success' => false,
                'error' =>$validator->errors()->toArray()
            ]);
        } else {
            $report = Report::firstOrCreate(array('id' =>  Input::get('id'))); //this will check for the id in contents table and create a new record if it doesn't exist
            $report -> heading = Input::get('fName');
            $report -> status = Input::get('status');
            $report -> save();
          if ( $report) return Response::json(array
                (
                    'success' => true, 
                    'last_insert_id' => $report->id
             ));
        }
    }
}