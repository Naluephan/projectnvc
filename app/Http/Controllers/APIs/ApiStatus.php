<?php

namespace App\Http\Controllers\APIs;

class ApiStatus
{

    /////////// Response Code and Description empLogStatus ///////////
    public const login_success_status = "Login Success Response";
    public const login_success_statusCode = "00";

    // Unsuccessful
    public const login_failed_found_status = "Login failed Found";
    public const login_failed_found_code = "10";
    public const login_failed_found_Desc = "Please check your username and password.";
    // public const login_message = "Login failed Found";
    //  catch
    public const login_error_status = "User Login Error";
    public const login_error_statusCod  = "500";
    public const login_errDesc  = "Error login";


    /////////// Response Code and Description empLogStatus ///////////
    public const log_success_status = "Log Success Response";
    public const log_success_statusCode = "00";
    // Unsuccessful
    public const log_failed_status = "Connect failed";
    public const log_failed_statusCode = "10";
    public const log_failed_Desc = "Connect failed";
    public const log_message = "Log Not Found";
    // Catch
    public const log_error_statusCode  = "500";
    public const log_error_status = "Log Error";
    public const log_errDesc  = "Error log";
    // public const pin_message = "Pin Not Found";



    /////////// Response Code and Description empLeaveStatus ///////////
    public const leave_success_status = "Leave Success Response";
    public const leave_success_statusCode = "00";
    // Unsuccessful
    public const leave_failed_status = "Connect failed";
    public const leave_failed_statusCode = "10";
    public const leave_failed_Desc = "No existing data found.Please check the employee ID again.";
    public const leave_message = "No existing data found.Please check the employee ID again.";
    // Catch
    public const leave_error_statusCode = "500";
    public const leave_error_status = "Leave Error";
    public const leave_errDesc = "Error leave";


     /////////// Response Code and Description PinStatus ///////////
     public const pin_success_status = "Record updated successfully";
     public const pin_success_statusCode = "00";
     // Unsuccessful
     public const pin_failed_status = "Update failed";
     public const pin_failed_statusCode = "500";
     public const pin_failed_Desc = "The ID was not found or the password may be incorrect.";
     // Catch
     public const pin_error_statusCode = "500";
     public const pin_error_status = "Pin Error";
     public const pin_errDesc = "Error Pin";


     /////////// Response Code and Salary  ///////////
     public const salary_success_status = "Send data successfully";
     public const salary_success_statusCode = "00";
     // Unsuccessful
     public const salary_failed_status = "This information was not found in data.";
     public const salary_failed_statusCode = "200";
     public const salary_failed_Desc = "Please check the information again.";
     // Catch
     public const salary_error_statusCode = "500";
     public const salary_error_status = "salary Error";
     public const salary_errDesc = "Error salary";

     /////////// Response Code and  Attendance ///////////
     public const timeAttendance_success_status = "Send data successfully";
     public const timeAttendance_success_statusCode = "00";
     // Unsuccessful
     public const timeAttendance_failed_status = "This information was not found in data.";
     public const timeAttendance_failed_statusCode = "200";
     public const timeAttendance_failed_Desc = "Please check the information again.";
     // Catch
     public const timeAttendance_error_statusCode = "500";
     public const timeAttendance_error_status = "timeAttendance Error";
     public const timeAttendance_errDesc = "Error TimeAttendance";

      /////////// Response Code and  rewardCoin ///////////
      public const rewardCoin_success_status = "Send data successfully";
      public const rewardCoin_success_statusCode = "00";
      // Unsuccessful
      public const rewardCoin_failed_status = "This information was not found in data.";
      public const rewardCoin_failed_statusCode = "200";
      public const rewardCoin_failed_Desc = "Please check the information again.";
      //Catch
      public const rewardCoin_error_statusCode = "500";
      public const rewardCoin_error_status = "rewardCoin Error";
      public const rewardCoin_errDesc = "Please check the information again.";

      /////////// Response Code and  requestSlipSalary ///////////
      public const requestSlip_success_status = "Send data successfully";
      public const requestSlip_success_statusCode = "00";
      // Unsuccessful
      public const requestSlip_failed_status = "This information was not found in data.";
      public const requestSlip_failed_statusCode = "200";
      public const requestSlip_failed_Desc = "Please check the information again.";
      //Catch
      public const requestSlip_error_statusCode = "500";
      public const requestSlip_error_status = "requestSlip Error";
      public const requestSlip_errDesc = "Please check the information again.";

      /////////// Employee Leave Quotas ///////////
      public const leaveQuotase_success_status = "Send data successfully";
      public const leaveQuotase_success_statusCode = "00";
      // Unsuccessful
      public const leaveQuotase_failed_status = "This information was not found in data.";
      public const leaveQuotase_failed_statusCode = "200";
      public const leaveQuotase_failed_Desc = "Please check the information again.";
      //Catch
      public const leaveQuotase_error_statusCode = "500";
      public const leaveQuotase_error_status = "EmployeeLeaveQuotas Error";
      public const leaveQuotase_errDesc = "Error EmployeeLeaveQuotas";

      /////////// Check Token ///////////
      public const checkToken_success_status = "Send data successfully";
      public const checkToken_success_statusCode = "00";
      // Unsuccessful
      public const checkToken_failed_status = "This information was not found in data.";
      public const checkToken_failed_statusCode = "200";
      public const checkToken_failed_Desc = "Please check the information again.";
      //Catch
      public const checkToken_error_statusCode = "500";
      public const checkToken_error_status = "Check Token Error";
      public const checkToken_errDesc = "Please check the information again.";

      /////////// Login Check Password ///////////
      public const login_check_password_success_status = "Send data successfully";
      public const login_check_password_success_statusCode = "00";
      // Unsuccessful
      public const login_check_password_failed_status = "This information was not found in data.";
      public const login_check_password_failed_statusCode = "200";
      public const login_check_password_failed_Desc = "Please check the information again.";
      //Catch
      public const login_check_password_error_statusCode = "500";
      public const login_check_password_error_status = "Login Check Password Error";
      public const login_check_password_errDesc = "Please check the information again.";

      /////////// Profile Check Password ///////////
      public const profile_check_password_success_status = "Send data successfully";
      public const profile_check_password_success_statusCode = "00";
      // Unsuccessful
      public const profile_check_password_failed_status = "This information was not found in data.";
      public const profile_check_password_failed_statusCode = "200";
      public const profile_check_password_failed_Desc = "Please check the information again.";
      //Catch
      public const profile_check_password_error_statusCode = "500";
      public const profile_check_password_error_status = "Profile Check Password Error";
      public const profile_check_password_errDesc = "Please check the information again.";

      /////////// Update Password ///////////
      public const update_password_success_status = "Send data successfully";
      public const update_password_success_statusCode = "00";
      // Unsuccessful
      public const update_password_failed_status = "This information was not found in data.";
      public const update_password_failed_statusCode = "200";
      public const update_password_failed_Desc = "Please check the information again.";
      //Catch
      public const update_password_error_statusCode = "500";
      public const update_password_error_status = "Update Password Error";
      public const update_password_errDesc = "Please check the information again.";

      /////////// News List ///////////
      public const news_list_success_status = "Send data successfully";
      public const news_list_success_statusCode = "00";
      // Unsuccessful
      public const news_list_failed_status = "This information was not found in data.";
      public const news_list_failed_statusCode = "200";
      public const news_list_failed_Desc = "Please check the information again.";
      //Catch
      public const news_list_error_statusCode = "500";
      public const news_list_error_status = "News List Error";
      public const news_list_errDesc = "Please check the information again.";

      /////////// News Notice List ///////////
      public const news_notice_list_success_status = "Send data successfully";
      public const news_notice_list_success_statusCode = "00";
      // Unsuccessful
      public const news_notice_list_failed_status = "This information was not found in data.";
      public const news_notice_list_failed_statusCode = "200";
      public const news_notice_list_failed_Desc = "Please check the information again.";
      //Catch
      public const news_notice_list_error_statusCode = "500";
      public const news_notice_list_error_status = "News Notice List Error";
      public const news_notice_list_errDesc = "Please check the information again.";

      /////////// News Notice Employee ///////////
      public const news_notice_employee_success_status = "Send data successfully";
      public const news_notice_employee_success_statusCode = "00";
      // Unsuccessful
      public const news_notice_employee_failed_status = "This information was not found in data.";
      public const news_notice_employee_failed_statusCode = "200";
      public const news_notice_employee_failed_Desc = "Please check the information again.";
      //Catch
      public const news_notice_employee_error_statusCode = "500";
      public const news_notice_employee_error_status = "News Notice Employee Error";
      public const news_notice_employee_errDesc = "Please check the information again.";

       /////////// News Notice Employee Update Read Status ///////////
       public const update_read_status_success_status = "Send data successfully";
       public const update_read_status_success_statusCode = "00";
       // Unsuccessful
       public const update_read_status_failed_status = "This information was not found in data.";
       public const update_read_status_failed_statusCode = "200";
       public const update_read_status_failed_Desc = "Please check the information again.";
       //Catch
       public const update_read_status_error_statusCode = "500";
       public const update_read_status_error_status = "News Notice Employee Update Read Status Error";
       public const update_read_status_errDesc = "Please check the information again.";

       /////////// News Notice Search News By Id ///////////
       public const search_news_by_id_success_status = "Send data successfully";
       public const search_news_by_id_success_statusCode = "00";
       // Unsuccessful
       public const search_news_by_id_failed_status = "This information was not found in data.";
       public const search_news_by_id_failed_statusCode = "200";
       public const search_news_by_id_failed_Desc = "Please check the information again.";
       //Catch
       public const search_news_by_id_error_statusCode = "500";
       public const search_news_by_id_error_status = "News Notice Search News By Id Error";
       public const search_news_by_id_errDesc = "Please check the information again.";

    /////////// Response Code and Reward Coin History ///////////
      public const reward_coin_history_success_status = "Send data successfully";
      public const reward_coin_history_success_statusCode = "00";
      // Unsuccessful
      public const reward_coin_history_failed_status = "This information was not found in data.";
      public const reward_coin_history_failed_statusCode = "200";
      public const reward_coin_history_failed_Desc = "Please check the information again.";
      //Catch
      public const reward_coin_history_error_statusCode = "500";
      public const reward_coin_history_error_status = "Reward Coin History Error";
      public const reward_coin_history_errDesc = "Please check the information again.";

       /////////// Response Transaction Historie ///////////
       public const transaction_history_success_status = "Send data successfully";
       public const transaction_history_success_statusCode = "00";
       // Unsuccessful
       public const transaction_history_failed_status = "This information was not found in data.";
       public const transaction_history_failed_statusCode = "200";
       public const transaction_history_failed_Desc = "Please check the information again.";
       //Catch
       public const transaction_history_error_statusCode = "500";
       public const transaction_history_error_status = "Transaction History Error";
       public const transaction_history_errDesc = "Please check the information again.";

      /////////// Private car ///////////
      public const list_private_car_success_status = "Send data successfully";
      public const list_private_car_success_statusCode = "00";
      // Unsuccessful
      public const list_private_car_failed_status = "This information was not found in data.";
      public const list_private_car_failed_statusCode = "200";
      public const list_private_car_failed_Desc = "Please check the information again.";
      //Catch
      public const list_private_car_error_statusCode = "500";
      public const list_private_car_error_status = "Private car Error";
      public const list_private_car_errDesc = "Please check the information again.";

      /////////// Pickup Tools ///////////
      public const list_pickup_tools_success_status = "Send data successfully";
      public const list_pickup_tools_success_statusCode = "00";
      // Unsuccessful
      public const list_pickup_tools_failed_status = "This information was not found in data.";
      public const list_pickup_tools_failed_statusCode = "200";
      public const list_pickup_tools_failed_Desc = "Please check the information again.";
      //Catch
      public const list_pickup_tools_error_statusCode = "500";
      public const list_pickup_tools_error_status = "Pickup Tools Error";
      public const list_pickup_tools_errDesc = "Please check the information again.";

      /////////// Organics Hero Mission ///////////
      public const list_organics_hero_mission_success_status = "Send data successfully";
      public const list_organics_hero_mission_success_statusCode = "00";
      // Unsuccessful
      public const list_organics_hero_mission_failed_status = "This information was not found in data.";
      public const list_organics_hero_mission_failed_statusCode = "200";
      public const list_organics_hero_mission_failed_Desc = "Please check the information again.";
      //Catch
      public const list_organics_hero_mission_error_statusCode = "500";
      public const list_organics_hero_mission_error_status = "Organics Hero Mission Error";
      public const list_organics_hero_mission_errDesc = "Please check the information again.";


       /////////// Reverse Fund ///////////
       public const reverse_fund_success_status = "Send data successfully";
       public const reverse_fund_success_statusCode = "00";
       // Unsuccessful
       public const reverse_fund_failed_status = "This information was not found in data.";
       public const reverse_fund_failed_statusCode = "200";
       public const reverse_fund_failed_Desc = "Please check the information again.";
       //Catch
       public const reverse_fund_error_statusCode = "500";
       public const reverse_fund_error_status = "Reverse Fund Error";
       public const reverse_fund_errDesc = "Please check the information again.";


       /////////// Honor ///////////
       public const honor_success_status = "Send data successfully";
       public const honor_success_statusCode = "00";
       // Unsuccessful
       public const honor_failed_status = "This information was not found in data.";
       public const honor_failed_statusCode = "200";
       public const honor_failed_Desc = "Please check the information again.";
       //Catch
       public const honor_error_statusCode = "500";
       public const honor_error_status = "Honor Error";
       public const honor_errDesc = "Please check the information again.";




       /////////// Social Security ///////////
       public const social_security_success_status = "Send data successfully";
       public const social_security_success_statusCode = "00";
       // Unsuccessful
       public const social_security_failed_status = "This information was not found in data.";
       public const social_security_failed_statusCode = "200";
       public const social_security_failed_Desc = "Please check the information again.";
       //Catch
       public const social_security_error_statusCode = "500";
       public const social_security_error_status = "Social Security Error";
       public const social_security_errDesc = "Please check the information again.";




        /////////// Group Insurance ///////////
        public const group_insurance_success_status = "Send data successfully";
        public const group_insurance_success_statusCode = "00";
        // Unsuccessful
        public const group_insurance_failed_status = "This information was not found in data.";
        public const group_insurance_failed_statusCode = "200";
        public const group_insurance_failed_Desc = "Please check the information again.";
        //Catch
        public const group_insurance_error_statusCode = "500";
        public const group_insurance_error_status = "Group insurance Error";
        public const group_insurance_errDesc = "Please check the information again.";
       /////////// Response Saving Money ///////////
       public const saving_money_success_status = "Send data successfully";
       public const saving_money_success_statusCode = "00";
       // Unsuccessful
       public const saving_money_failed_status = "This information was not found in data.";
       public const saving_money_failed_statusCode = "200";
       public const saving_money_failed_Desc = "Please check the information again.";
       
       //Catch
       public const saving_money_error_statusCode = "500";
       public const saving_money_error_status = "Saving Money Error";
       public const saving_money_errDesc = "Please check the information again.";

};

//Error Code and Description empLogStatus
// class ApiLogStatus {

//     public const log_status = "Log Success";
//     public const log_statusCode = "00";

//      //  Error Code and Description empLogStatus not found
//      public const log_not_found = "log Error";
//      public const log_status_not_found = "10";
//      public const nfDesc = "Error not found";
//      public const message = "invalid user";

//     //  catch Error Code and Description
//     public const log_error_status = "Error EmployeeLog";
//     public const log_error_code= "10";
//     public const errDesc = "Error EmployeeLog";
//     public const errorCode = "500";

// };

//Error Code and Description empLeaveStatus
// class ApiLeaveStatus {
//     public const LEAVE_RESPONSE  = [
//         'status' => 'LEAVE',
//         'errCode' => null,
//         'errDesc' => null
//     ];
//     public const status = "Leave Success";
//     public const statusCode = "00";

//     //  Error Code and Description empLeaveStatus not found
//     public const log_not_found = "leave Error";
//     public const log_status_not_found = "10";
//     public const nfDesc = "Error not found";
//     public const message = "invalid user";

//     //  catch Error Code and Description
//     public const leave_error = "Error EmployeeLeave";
//     public const leave_status = "10";
//     public const errDesc = "Error EmployeeLeave";
//     public const errorCode = "500";

// }

   // Error Code and Description empLogoutStatus
// class ApiLogoutStatus {
//     public const LOGOUT_RESPONSE  = [
//         'status' => ApiStatus::LOGOUT,
//         'errCode' => null,
//         'errDesc' => null
//     ];
//     public const status = "User Logout";
//     public const statusCode = "00";

//     //  catch Error Code and Description
//     public const user_error = "User Error";
//     public const user_status = "10";
//     public const errDesc = "Error Logout";
//     public const errorCode = "ELO";

// }

