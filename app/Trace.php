<?php

namespace App;

class Trace
{

    /*
      Just an easy handler for message on creation of a new item in DB
      
      @param String   Header for the message
      @param \Illuminate\Http\Request  $request
     */  
    public static function traceCreate(String $header, \Illuminate\Http\Request $request){
        \Log::channel('trace')->info($header.' CREATE [#'.\Auth::user()->id.'-'.\Auth::user()->name.':'.\Auth::user()->email.'] : ', [$request->except('_token')]);
    }

    /*
      Just an easy handler for message on creation of a new item in DB
      A special case for the User creation...
      
      @param String   Header for the message
      @param Object   $data
     */  
    public static function traceCreateUser(String $header, $data){
        \Log::channel('trace')->info($header.' CREATE : ', [$data]);
    }
    
    /*
      Just an easy handler for message on update of an item in DB
      
      @param String   Header for the message
      @param \Illuminate\Http\Request  $request
      @param Object   Updated item info (before update)
     */  
    public static function traceUpdate(String $header, \Illuminate\Http\Request $request, $object){
        \Log::channel('trace')->info($header.' UPDATE [#'.\Auth::user()->id.'-'.\Auth::user()->name.':'.\Auth::user()->email.'] : [before, after]', [$object, $request->except('_token')]);
    }

    /*
      Just an easy handler for message on delete of an item in DB
      
      @param String   Header for the message
      @param Object   Deleted item info
     */  
    public static function traceDelete(String $header, $object){
        \Log::channel('trace')->info($header.' DELETE [#'.\Auth::user()->id.'-'.\Auth::user()->name.':'.\Auth::user()->email.'] : [was...]', [$object]);
    }

    /*
      Just an easy handler for message on user login/logout
      
      @param String   Header for the message
     */  
    public static function traceLogging(String $header){
        if( \Auth::user() != NULL ){
            \Log::channel('trace')->info($header.' [#'.\Auth::user()->id.'-'.\Auth::user()->name.':'.\Auth::user()->email.']');
        }
    }
 

}
