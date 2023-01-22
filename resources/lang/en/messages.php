<?php
return [
    "FAIL_SAVE_DATA" => "Failed save data!",
    "INVALID_FORMAT" => "Invalid format!",

    // TABLE NOTIFICATIONS
    "TITLE_FORMAT_NEW_INSPECTION" => "\xF0\x9F\x86\x95 Inspection",
    "TITLE_FORMAT_FINISHED_INSPECTION" => "Inspection Reviewed \xE2\x9C\x85 \xE2\x9C\x85",
    "TITLE_FORMAT_SAPNOTIF_INSPECTION" => "\xF0\x9F\x86\x99 Notification",
    "TITLE_FORMAT_SAPMO_INSPECTION" => "\xF0\x9F\x86\x99 Maintenace Order",
    "TITLE_FORMAT_CLOSESAP_INSPECTION" => "",
    "TITLE_FORMAT_NEW_TIANDCWR" => "\xF0\x9F\x86\x95 Form TI",
    "TITLE_FORMAT_FINISHED_TIANDCWR" => "Form TI Reviewed \xE2\x9C\x85 \xE2\x9C\x85",
    "TITLE_FORMAT_STATUS_CWR" => "\xF0\x9F\x86\x99 CWR Status",

    "MESSAGE_FORMAT_NEW_INSPECTION" => "Equipment :equipment_id \n ✅ :total_machine_down ✔️ :total_iminient ☑️ :total_backlog ❌ :total_schedule \nStatus :status_name \n Inspection :no ",
    "MESSAGE_FORMAT_FINISHED_INSPECTION" => "Equipment :equipment_id \n ✅ :total_machine_down ✔️ :total_iminient ☑️ :total_backlog ❌ :total_schedule \nStatus :status_name \n Inspection :no ",
    "MESSAGE_FORMAT_SAPNOTIF_INSPECTION" => "Notification :no_notif of Equipment :equipment_id has been created \n Inspection :no ",
    "MESSAGE_FORMAT_SAPMO_INSPECTION" => "Maintenance Order :no_mo of Notification :no_notif has been created",
    "MESSAGE_FORMAT_CLOSESAP_INSPECTION" => "",
    "MESSAGE_FORMAT_NEW_TIANDCWR" => "Form TI with number :no_ti has been generated",
    "MESSAGE_FORMAT_FINISHED_TIANDCWR" => "Form TI with number :no_ti finished in review",
    "MESSAGE_FORMAT_STATUS_CWR" => "CWR number :no_cwr updated. Status : :status_name",

];
