<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Dashboards

Route::get('/', function () {
    return view('welcome');
});


Route::resource('photo', 'PhotoController');
Route::resource('property', 'PropertyController');
Route::resource('user', 'UserController');
Route::resource('room', 'RoomController');
Route::resource('amenity', 'AmenityController');
Route::resource('ptypes', 'PTypesController');
Route::resource('rate_property', 'Rate_PropertyController');
Route::resource('order', 'OrderController');
Route::resource('site_settings', 'Site_SettingsController');
Route::resource('chat_message', 'Chat_MessageController');
Route::resource('facility', 'FacilityController');
Route::resource('properties_facilities', 'Properties_FacilitiesController');
Route::resource('contact_us', 'Contact_UsController');
Route::resource('slider', 'SliderController');
Route::resource('notification', 'NotificationController');
Route::resource('video', 'VideoController');
Route::resource('wishlist', 'WishlistController');



    Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::prefix('dashboard')->group(function () {
Route::view('/', 'dashboards.default_dashboard')->name('dashboard');
});
Route::view('ecommerce-dashboard', 'dashboards.ecommerce_dashboard')->name('ecommerce_dashboard');

//page_layout
Route::view('box-layout', 'page_layout.box_layout')->name('box_layout');
Route::view('layout-rtl', 'page_layout.layout_rtl')->name('layout_rtl');
Route::view('layout-dark', 'page_layout.layout_dark')->name('layout_dark');
Route::view('hide-on-scroll', 'page_layout.hide_on_scroll')->name('hide_on_scroll');
Route::view('footer-light', 'page_layout.footer_light')->name('footer_light');
Route::view('footer-dark', 'page_layout.footer_dark')->name('footer_dark');
Route::view('footer-fixed', 'page_layout.footer_fixed')->name('footer_fixed');

//users
Route::view('user-profile', 'users.user_profile')->name('user_profile');
Route::view('edit-profile', 'users.edit_profile')->name('edit_profile');
Route::view('user-cards', 'users.user_cards')->name('user_cards');



//Forms -> form_controls
Route::view('form-validation', 'forms.form_controls.form_validation')->name('form_validation');
Route::view('base-input', 'forms.form_controls.base_input')->name('base_input');
Route::view('radio-checkbox-control', 'forms.form_controls.radio_checkbox_control')->name('radio_checkbox_control');
Route::view('input-group', 'forms.form_controls.input_group')->name('input_group');
Route::view('megaoptions', 'forms.form_controls.megaoptions')->name('megaoptions');

//Forms -> form_widgets
Route::view('datepicker', 'forms.form_widgets.datepicker')->name('datepicker');
Route::view('time-picker', 'forms.form_widgets.time_picker')->name('time_picker');
Route::view('datetimepicker', 'forms.form_widgets.datetimepicker')->name('datetimepicker');
Route::view('daterangepicker', 'forms.form_widgets.daterangepicker')->name('daterangepicker');
Route::view('touchspin', 'forms.form_widgets.touchspin')->name('touchspin');
Route::view('select2', 'forms.form_widgets.select2')->name('select2');
Route::view('switch', 'forms.form_widgets.switch')->name('switch');
Route::view('typeahead', 'forms.form_widgets.typeahead')->name('typeahead');
Route::view('clipboard', 'forms.form_widgets.clipboard')->name('clipboard');

//Forms -> form_layout
Route::view('default-form', 'forms.form_layout.default_form')->name('default_form');
Route::view('form-wizard', 'forms.form_layout.form_wizard')->name('form_wizard');
Route::view('two-form-wizard', 'forms.form_layout.form_wizard_two')->name('form_wizard_two');
Route::view('three-form-wizard', 'forms.form_layout.form_wizard_three')->name('form_wizard_three');

//Tables -> bootstrap_tables
Route::view('bootstrap-basic-table', 'tables.bootstrap_tables.bootstrap_basic_table')->name('bootstrap_basic_table');
Route::view('bootstrap-sizing-table', 'tables.bootstrap_tables.bootstrap_sizing_table')->name('bootstrap_sizing_table');
Route::view('bootstrap-border-table', 'tables.bootstrap_tables.bootstrap_border_table')->name('bootstrap_border_table');
Route::view('bootstrap-styling-table', 'tables.bootstrap_tables.bootstrap_styling_table')->name('bootstrap_styling_table');
Route::view('table-components', 'tables.bootstrap_tables.table_components')->name('table_components');

//Tables -> data_tables
Route::view('datatable-basic-init', 'tables.data_tables.datatable_basic_init')->name('datatable_basic_init');
Route::view('datatable-advance', 'tables.data_tables.datatable_advance')->name('datatable_advance');
Route::view('datatable-styling', 'tables.data_tables.datatable_styling')->name('datatable_styling');
Route::view('datatable-ajax', 'tables.data_tables.datatable_ajax')->name('datatable_ajax');
Route::view('datatable-server-side', 'tables.data_tables.datatable_server_side')->name('datatable_server_side');
Route::view('datatable-plugin', 'tables.data_tables.datatable_plugin')->name('datatable_plugin');
Route::view('datatable-api', 'tables.data_tables.datatable_api')->name('datatable_api');
Route::view('datatable-data-source', 'tables.data_tables.datatable_data_source')->name('datatable_data_source');

//Tables -> extension_data_tables
Route::view('datatable-ext-autofill', 'tables.datatable_ext_autofill')->name('datatable_ext_autofill');

//Tables ->jsgrid-table
Route::view('jsgrid-table', 'tables.jsgrid_table')->name('jsgrid_table');

//icons
Route::view('flag-icon', 'icons.flag_icon')->name('flag_icon');
Route::view('font-awesome', 'icons.font_awesome')->name('font_awesome');
Route::view('ico-icon', 'icons.ico_icon')->name('ico_icon');
Route::view('themify-icon', 'icons.themify_icon')->name('themify_icon');
Route::view('feather-icon', 'icons.feather_icon')->name('feather_icon');
Route::view('whether-icon', 'icons.whether_icon')->name('whether_icon');


//others -> error_page
Route::view('error-page1', 'others.error_pages.error_page1')->name('error_page1');
Route::view('error-page2', 'others.error_pages.error_page2')->name('error_page2');
Route::view('error-page3', 'others.error_pages.error_page3')->name('error_page3');
Route::view('error-page4', 'others.error_pages.error_page4')->name('error_page4');
Route::view('error-page5', 'others.error_pages.error_page5')->name('error_page5');

//others -> authentication
Route::view('login', 'others.authentication.login')->name('login');
Route::view('login-one', 'others.authentication.login_one')->name('login_one');
Route::view('login-two', 'others.authentication.login_two')->name('login_two');
Route::view('login-bs-validation', 'others.authentication.login_bs_validation')->name('login_bs_validation');
Route::view('login-bs-tt-validation', 'others.authentication.login_bs_tt_validation')->name('login_bs_tt_validation');
Route::view('login-sa-validation', 'others.authentication.login_sa_validation')->name('login_sa_validation');
Route::view('sign-up', 'others.authentication.sign_up')->name('sign_up');
Route::view('sign-up-one', 'others.authentication.sign_up_one')->name('sign_up_one');
Route::view('sign-up-two', 'others.authentication.sign_up_two')->name('sign_up_two');
Route::view('unlock', 'others.authentication.unlock')->name('unlock');
Route::view('forget-password', 'others.authentication.forget_password')->name('forget_password');
Route::view('reset-password', 'others.authentication.reset_password')->name('reset_password');
Route::view('maintenance', 'others.authentication.maintenance')->name('maintenance');

//others -> coming_soon
Route::view('comingsoon', 'others.coming_soon.comingsoon')->name('comingsoon');
Route::view('comingsoon-bg-video', 'others.coming_soon.comingsoon_bg_video')->name('comingsoon_bg_video');
Route::view('comingsoon-bg-img', 'others.coming_soon.comingsoon_bg_img')->name('comingsoon_bg_img');

//others -> email_templates
Route::view('basic-template', 'others.email_templates.basic_template')->name('basic_template');
Route::view('email-header', 'others.email_templates.email_header')->name('email_header');
Route::view('ecommerce-templates', 'others.email_templates.ecommerce_templates')->name('ecommerce_templates');
Route::view('email-order-success', 'others.email_templates.email_order_success')->name('email_order_success');
Route::view('template-email', 'others.email_templates.template_email')->name('template_email');
Route::view('template-email-2', 'others.email_templates.template_email_2')->name('template_email_2');








