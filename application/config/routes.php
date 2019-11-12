<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['dashboard-student'] = 'studentpage/dashboardStudent';
$route['information-student'] = 'studentpage/information';
$route['information-teacher'] = 'teacherpage/information';
$route['account'] = 'studentpage/account';
$route['dashboard-teacher'] = 'teacherpage/dashboardTeacher';
$route['subject/(:any)'] = 'adminpage/viewOneSubject/$1';
$route['course/(:any)'] = 'adminpage/courseUpdate/$1';

$route['section/(:any)'] = 'adminpage/openOneSection/$1';

$route['pending-registration/(:any)'] = 'adminpage/student_info/$1';
$route['pending-registration1/(:any)'] = 'adminpage/teacher_info/$1';

$route['default_controller'] = 'homepage/pages';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['about'] = 'homepage/about';
// $route['mission'] = 'homepage/mission';
// $route['vision'] = 'homepage/vision';
// $route['history'] = 'homepage/history';
// $route['abm'] = 'homepage/abm';
// $route['humss'] = 'homepage/humss';
// $route['stem'] = 'homepage/stem';
// $route['courses'] = 'homepage/courses';
// $route['contact'] = 'homepage/contact';
$route['teacher'] = 'adminpage/teacher';
$route['teacher2/(:any)'] = 'adminpage/teacher2/$1';
$route['student'] = 'adminpage/student';
$route['student2/(:any)'] = 'adminpage/student2/$1';
$route['dashboard'] = 'adminpage/dashboard';
$route['course'] = 'adminpage/course';
$route['subject'] = 'adminpage/subject';

$route['section'] = 'adminpage/openSection';

$route['student-registration'] = 'homepage/register1';

$route['school-event'] = 'adminpage/school_event';

$route['pending-registration'] = 'adminpage/pending_registration';
$route['student-information'] = 'adminpage/student_info';
$route['teacher-information'] = 'adminpage/teacher_info';
$route['(:any)'] = 'homepage/pages/$1';

