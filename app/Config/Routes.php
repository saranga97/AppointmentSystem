<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/', 'HomeController::index');
$routes->get('/make-appointment', 'AppointmentsController::create', ['filter' => 'auth']);
$routes->get('/login', 'AuthController::login');
$routes->post('/auth/authenticate', 'AuthController::authenticate');
$routes->get('/register', 'AuthController::register');
$routes->post('/auth/createAccount', 'AuthController::createAccount');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/auth/logout', 'AuthController::logout');

// Routes for Admin
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'AdminDashboardController::index');
    $routes->get('users', 'AdminController::users');
    $routes->get('manage_appointments', 'AdminController::manageAppointments');
    $routes->post('edit_appointment/(:num)', 'AdminController::editAppointment/$1');
    $routes->get('delete_appointment/(:num)', 'AdminController::deleteAppointment/$1');
    $routes->get('manage_inventories', 'AdminController::manageInventories');
    $routes->post('add_inventory', 'AdminController::addInventory');
    $routes->post('edit_inventory/(:any)', 'AdminController::editInventory/$1');
    $routes->get('delete_inventory/(:any)', 'AdminController::deleteInventory/$1');
    $routes->get('manage_users', 'AdminController::manageUsers');
    $routes->post('add_doctor', 'AdminController::addDoctor');
    $routes->post('add_assistant', 'AdminController::addAssistant');
    $routes->get('delete_user/(:num)', 'AdminController::deleteUser/$1');
    $routes->get('wound_care', 'AdminController::woundCare');  // List wound care sessions
    $routes->post('add_wound_care', 'AdminController::addWoundCare');  // Add a new wound care session
    $routes->post('edit_wound_care/(:any)', 'AdminController::editWoundCare/$1');  // Edit a wound care session
    $routes->get('delete_wound_care/(:any)', 'AdminController::deleteWoundCare/$1');  // Delete a wound care session
    $routes->get('toggle_system_status', 'AdminController::toggleSystemStatus');
    $routes->post('toggle_system_status', 'AdminController::toggleSystemStatus');
    $routes->get('patients', 'AdminController::patients');
    $routes->get('patient_records/(:num)', 'AdminController::patientRecords/$1');
});



// Routes for Doctor
$routes->group('doctor', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'DoctorDashboardController::index');
    $routes->get('patients', 'DoctorController::patients');
    $routes->get('patient_records/(:num)', 'DoctorController::patientRecords/$1');
    $routes->get('appointments', 'DoctorController::appointments');
    $routes->post('update_appointment_status/(:num)', 'DoctorController::updateAppointmentStatus/$1');
    $routes->get('inventories', 'DoctorController::inventories');
    $routes->get('add_treatment/(:num)', 'DoctorController::addTreatment/$1');
    $routes->post('store_treatment', 'DoctorController::storeTreatment');
});


// Routes for Assistant
$routes->group('assistant', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'AssistantController::appointments');
    $routes->get('appointments', 'AssistantController::appointments');
    $routes->get('edit_appointment/(:num)', 'AssistantController::editAppointment/$1');
    $routes->post('update_appointment/(:num)', 'AssistantController::updateAppointment/$1');
    $routes->get('delete_appointment/(:num)', 'AssistantController::deleteAppointment/$1');
    $routes->get('events', 'AssistantController::events');
    $routes->post('add_event', 'AssistantController::addEvent');
    $routes->get('inventories', 'AssistantController::inventories');
    $routes->post('add_inventory', 'AssistantController::addInventory');
    $routes->post('edit_inventory/(:any)', 'AssistantController::editInventory/$1');
    $routes->get('delete_inventory/(:any)', 'AssistantController::deleteInventory/$1');
    $routes->get('reports', 'AssistantController::reports');
    $routes->post('add_report', 'AssistantController::addReport');
    $routes->post('edit_report/(:num)', 'AssistantController::editReport/$1');  
    $routes->post('update_report/(:num)', 'AssistantController::updateReport/$1');
    $routes->get('download_report/(:num)', 'AssistantController::downloadReport/$1');
});


// Routes for Patient
$routes->group('patient', ['filter' => 'auth'], function ($routes) {
    $routes->get('dashboard', 'PatientController::dashboard');
    $routes->get('notifications', 'PatientController::notifications');
    $routes->get('treatment_history', 'PatientController::treatmentHistory');
    $routes->get('payment_history', 'PatientController::paymentHistory');
    $routes->get('make_payment', 'PatientController::makePayment');
    $routes->post('process_payment', 'PatientController::processPayment');
    $routes->get('wound_dressing_alerts', 'PatientController::woundDressingAlerts');
    $routes->get('appointments', 'PatientController::appointments');
    $routes->post('cancel_appointment/(:num)', 'PatientController::cancelAppointment/$1');
    $routes->get('enquiries', 'PatientController::enquiries');
    $routes->post('send_enquiry', 'PatientController::sendEnquiry');
    $routes->get('wound_care_knowledge', 'PatientController::woundCareKnowledge');
    $routes->get('recommendations', 'PatientController::recommendations');
});

// Routes for Appointments
$routes->group('appointments', ['filter' => 'auth'], function ($routes) {
    $routes->get('create', 'AppointmentsController::create');
    $routes->post('store', 'AppointmentsController::store');
});


// Add additional routes for other functionalities based on your project requirements
