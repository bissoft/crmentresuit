<?php

use App\Http\Controllers\InterviewController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\VideoMeetingController;
use Illuminate\Support\Facades\Auth;
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

//signature
Route::get('signature/{id}/{email}', 'DocumentController@customerSign')->name('customer.signature');
//
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/login/{lang?}', 'Auth\LoginController@showLoginForm')->name('dashboard')->middleware(['XSS',]);
Route::get('/register/{lang?}', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware(['XSS',]);

Route::get('/password/resets/{lang?}', 'Auth\LoginController@showLinkRequestForm')->name('change.langPass');

Route::prefix('customer')->as('customer.')->group(
    function (){
        Route::get('login/{lang}', 'Auth\LoginController@showCustomerLoginLang')->name('login.lang')->middleware(['XSS']);
        Route::get('login', 'Auth\LoginController@showCustomerLoginForm')->name('login')->middleware(['XSS']);
        Route::post('login', 'Auth\LoginController@customerLogin')->name('login')->middleware(['XSS']);
        Route::get('dashboard', 'CustomerController@dashboard')->name('dashboard')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );

        Route::get('invoice', 'InvoiceController@customerInvoice')->name('invoice')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::get('proposal', 'ProposalController@customerProposal')->name('proposal')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );

        Route::get('proposal/{id}/show', 'ProposalController@customerProposalShow')->name('proposal.show')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );

        Route::get('invoice/{id}/send', 'InvoiceController@customerInvoiceSend')->name('invoice.send')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::post('invoice/{id}/send/mail', 'InvoiceController@customerInvoiceSendMail')->name('invoice.send.mail')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );

        Route::get('invoice/{id}/show', 'InvoiceController@customerInvoiceShow')->name('invoice.show')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );


        Route::post('invoice/{id}/payment', 'StripePaymentController@addpayment')->name('invoice.payment')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::get('payment', 'CustomerController@payment')->name('payment')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::get('transaction', 'CustomerController@transaction')->name('transaction')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::post('logout', 'CustomerController@customerLogout')->name('logout')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::get('profile', 'CustomerController@profile')->name('profile')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );

        Route::put('update-profile', 'CustomerController@editprofile')->name('update.profile')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::put('billing-info', 'CustomerController@editBilling')->name('update.billing.info')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::put('shipping-info', 'CustomerController@editShipping')->name('update.shipping.info')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::put('change.password', 'CustomerController@updatePassword')->name('update.password')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::get('change-language/{lang}', 'CustomerController@changeLanquage')->name('change.language')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );

        Route::post('{id}/pay-with-paypal', 'PaypalController@customerPayWithPaypal')->name('pay.with.paypal')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
        Route::get('{id}/get-payment-status', 'PaypalController@customerGetPaymentStatus')->name('get.payment.status')->middleware(
            [
                'auth:customer',
                'XSS',
            ]
        );
    }
);

Route::prefix('vender')->as('vender.')->group(
    function (){
        Route::get('login/{lang}', 'Auth\LoginController@showVenderLoginLang')->name('login.lang')->middleware(['XSS']);
        Route::get('login', 'Auth\LoginController@showVenderLoginForm')->name('login')->middleware(['XSS']);
        Route::post('login', 'Auth\LoginController@VenderLogin')->name('login')->middleware(['XSS']);
        Route::get('dashboard', 'VenderController@dashboard')->name('dashboard')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::get('bill', 'BillController@VenderBill')->name('bill')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::get('bill/{id}/show', 'BillController@venderBillShow')->name('bill.show')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );


        Route::get('bill/{id}/send', 'BillController@venderBillSend')->name('bill.send')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::post('bill/{id}/send/mail', 'BillController@venderBillSendMail')->name('bill.send.mail')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );


        Route::get('payment', 'VenderController@payment')->name('payment')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::get('transaction', 'VenderController@transaction')->name('transaction')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::post('logout', 'VenderController@venderLogout')->name('logout')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );

        Route::get('profile', 'VenderController@profile')->name('profile')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );

        Route::put('update-profile', 'VenderController@editprofile')->name('update.profile')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::put('billing-info', 'VenderController@editBilling')->name('update.billing.info')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::put('shipping-info', 'VenderController@editShipping')->name('update.shipping.info')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::put('change.password', 'VenderController@updatePassword')->name('update.password')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );
        Route::get('change-language/{lang}', 'VenderController@changeLanquage')->name('change.language')->middleware(
            [
                'auth:vender',
                'XSS',
            ]
        );

    }
);


  Route::get('/', 'DashboardController@index')->name('dashboard')->middleware(['XSS',]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::get('profile', 'UserController@profile')->name('profile')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::put('edit-profile', 'UserController@editprofile')->name('update.account')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('users', 'UserController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::put('change-password', 'UserController@updatePassword')->name('update.password');


Route::resource('roles', 'RoleController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('permissions', 'PermissionController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){
    Route::get('change-language/{lang}', 'LanguageController@changeLanquage')->name('change.language');
    Route::get('manage-language/{lang}', 'LanguageController@manageLanguage')->name('manage.language');
    Route::post('store-language-data/{lang}', 'LanguageController@storeLanguageData')->name('store.language.data');
    Route::get('create-language', 'LanguageController@createLanguage')->name('create.language');
    Route::post('store-language', 'LanguageController@storeLanguage')->name('store.language');

    Route::delete('/lang/{lang}', 'LanguageController@destroyLang')->name('lang.destroy');
}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::resource('systems', 'SystemController');
    Route::post('email-settings', 'SystemController@saveEmailSettings')->name('email.settings');
    Route::post('company-settings', 'SystemController@saveCompanySettings')->name('company.settings');
    Route::post('system-settings', 'SystemController@saveSystemSettings')->name('system.settings');
    Route::get('company-setting', 'SystemController@companyIndex')->name('company.setting');
    Route::post('business-setting', 'SystemController@saveBusinessSettings')->name('business.setting');
    Route::post('company-payment-setting', 'SystemController@saveCompanyPaymentSettings')->name('company.payment.settings');
    Route::get('test-mail', 'SystemController@testMail')->name('test.mail');
    Route::post('test-mail', 'SystemController@testSendMail')->name('test.send.mail');

}
);




// Emails Routes
Route::get('/emails', 'EmailMarketingController@index')->name('emails.index');
Route::match(['get','post'],'/emails/create', 'EmailMarketingController@create')->name('emails.create');
Route::match(['get','post'],'/emails/update/{id}', 'EmailMarketingController@update')->name('emails.update');
Route::match(['get','post'],'/emails/send', 'EmailMarketingController@send')->name('emails.send');
Route::match(['get','post'],'/emails/send/single/{id}', 'EmailMarketingController@single')->name('emails.send.single');


// Messages Route

Route::get('/start-chat', 'ChatController@startChat')->name('startChat');
Route::get('/chat/{id?}', 'ChatController@chat')->name('chat');
Route::get('/refresh-msgs/{id}', 'ChatController@refreshMsgs')->name('refreshMsgs');
Route::get('/send-msg', 'ChatController@sendMsg')->name('sendMsg');


// Route::resource('booking', BookingController::class);

Route::resource('booking', 'BookingController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('/booking-schedule', 'BookingController@bookingSchedule')->name('bookingSchedule');


// referral route
Route::get('/referral', 'ReferralController@index')->name('referral.index');

//Project 
Route::resource('projects', 'ProjectController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('tickets', 'TicketController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('departments', 'DepartmentController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('services', 'ServicesController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('predefined-replies', 'PredefinedreplyController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('predefined-reply',  'PredefinedreplyController@predefinedReply')->name('predefined-reply')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('ticketpriorities', 'TicketPriorityController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('ticketstatuses', 'TicketStatusController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('plans', 'PlanController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('plan_attributes', 'PlanAttributeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

        Route::get('/subscription/plans/{type?}', 'SubscriptionController@retrievePlans')->name('subscription.plans');
        Route::get('/subscribe/{id}', 'SubscriptionController@showSubscription')->name('subscribe');
        Route::post('/subscribe', 'SubscriptionController@processSubscription')->name('process.subscription');
        Route::get('/subscribed/users', 'SubscriptionController@subscribedUsers')->name('subscribed.users');

    }
);




Route::get('productservice/index', 'ProductServiceController@index')->name('productservice.index');
Route::resource('productservice', 'ProductServiceController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
// /*Document Route starts*/
Route::get('document', 'DocumentController@index')->name('document.index');
Route::get('document/view/{id}', 'DocumentController@create')->name('document.create');
Route::post('document/store',  'DocumentController@store')->name('document.store');
Route::post('document/update',  'DocumentController@update')->name('document.update');
Route::get('document/{id}/remove',  'DocumentController@remove')->name('document.remove');
Route::get('document/details/{id}',  'DocumentController@documentBYId')->name('document.details');
Route::post('document/rename-document',  'DocumentController@renameDocument')->name('document.rename');
Route::post('document/add-document-user',  'DocumentController@addDocumentUser')->name('document-user.store');
Route::post('document/edit-document-user',  'DocumentController@editDocumentUser')->name('document-user.update');
Route::get('get-document-users/{id}', 'DocumentController@getDocumentUsers')->name('get.document.users');
Route::get('get-document-user-details/{id}', 'DocumentController@getDocumentUserDetails');
Route::get('delete-document-user/{id}', 'DocumentController@deleteDocumentUser');
Route::get('send-document-to-users/{id}','DocumentController@sendDocumentUser')->name('send.document.to.users');
Route::get('document-download/{id}','DocumentController@getDownload')->name('document.download');
Route::get('got-it-how-to-add-user', 'DocumentController@gotItHowToAddUser');
Route::get('got-it-how-to-add-user-signature','DocumentController@gotItHowToAddUserSignature');
Route::get('got-it-how-to-add-signature-box', 'DocumentController@gotItHowToAddSignatureBox');
Route::post('folder/search', 'DocumentController@searchFolder')->name('folder.search');
Route::post('folder/suggestion-search', 'DocumentController@suggestionSearch')->name('folder.suggestion.search');
Route::get('document/response-list/{id}', 'DocumentController@documentResponseList')->name('document.response.list');

Route::post('document/add-document-user-element', 'DocumentController@addDocumentUserElement')->name('document-user-element.store');
Route::get('get-document-elements/{id}/{page}/{user_id}', 'DocumentController@getDocumentElements')->name('get.document.element');
Route::get('delete-document-elements/{id}',  'DocumentController@deleteDocumentElement')->name('delete.document.element');

Route::post('folder/store', 'DocumentController@folderStore')->name('folder.store');
Route::post('folder/update', 'DocumentController@folderUpdate')->name('folder.update');
Route::get('folder/details/{id}',  'DocumentController@folderBYId')->name('folder.details');
Route::get('folder/{id}/remove', 'DocumentController@removeFolder')->name('folder.remove');
Route::get('document/modify/{id}', 'DocumentController@modifyDocument')->name('document.modify');
/*un-auth route of document*/
Route::post('document/document-response-store','DocumentController@documentUserResponseStore')->name('document-user-response.store');
Route::get('document/check-file/{id}/{user_id}/{send_id}', 'DocumentController@checkDocumentAttachFile')->name('check.email.document');
Route::get('document/document-file/{id}/{user_id}/{send_id}','DocumentController@downloadFile')->name('download.document.file');
/*Document route ended*/

Route::post('document/signature-store', 'DocumentController@documentSignature')->name('document-signature.store');

Route::post('document/image-store', 'DocumentController@documentImage')->name('document-image.store');
Route::post('document/text-store', 'DocumentController@documentText')->name('document-text.store');


Route::get('upload/document/{id}', 'DocumentController@uploadDocument')->name('document.upload');
Route::get('documents','DocumentController@documents')->name('staff.documents');
//end

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){
		Route::post('deleteInterview', [InterviewController::class,'destroy'])->name('deleteInterview');
		Route::match(['get','post'],'/video-meeting',[InterviewController::class,'index']);
		Route::match(['get','post'],'/video-meeting/create',[InterviewController::class,'add'])->name('admin.interview.create');
		Route::match(['get','post'],'/video-meeting/store',[InterviewController::class,'store'])->name('admin.interview.store');
		Route::match(['get','post'],'/video-meeting/edit/{id}',[InterviewController::class,'edit'])->name('admin.interview.edit');
		Route::match(['get','post'],'video-meeting/update/{id}',[InterviewController::class,'updated'])->name('admin.interview.update');
		Route::match(['get','post'],'credentials',[InterviewController::class,'credentials'])->name('credentials');
		

    Route::get('customer/{id}/show', 'CustomerController@show')->name('customer.show');
    Route::resource('customer', 'CustomerController');

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::get('vender/{id}/show', 'VenderController@show')->name('vender.show');
    Route::resource('vender', 'VenderController');

}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::resource('bank-account', 'BankAccountController');

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::get('transfer/index', 'TransferController@index')->name('transfer.index');
    Route::resource('transfer', 'TransferController');

}
);


Route::resource('taxes', 'TaxController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('product-category', 'ProductServiceCategoryController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('product-unit', 'ProductServiceUnitController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::get('invoice/pdf/{id}', 'InvoiceController@invoice')->name('invoice.pdf')->middleware(['XSS',]);
Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){


    Route::get('invoice/{id}/duplicate', 'InvoiceController@duplicate')->name('invoice.duplicate');
    Route::get('invoice/{id}/shipping/print', 'InvoiceController@shippingDisplay')->name('invoice.shipping.print');
    Route::get('invoice/{id}/payment/reminder', 'InvoiceController@paymentReminder')->name('invoice.payment.reminder');
    Route::get('invoice/index', 'InvoiceController@index')->name('invoice.index');
    Route::post('invoice/product/destroy', 'InvoiceController@productDestroy')->name('invoice.product.destroy');
    Route::post('invoice/product', 'InvoiceController@product')->name('invoice.product');
    Route::post('invoice/customer', 'InvoiceController@customer')->name('invoice.customer');
    Route::get('invoice/{id}/sent', 'InvoiceController@sent')->name('invoice.sent');
    Route::get('invoice/{id}/resent', 'InvoiceController@resent')->name('invoice.resent');
    Route::get('invoice/{id}/payment', 'InvoiceController@payment')->name('invoice.payment');
    Route::post('invoice/{id}/payment', 'InvoiceController@createPayment')->name('invoice.payment');
    Route::post('invoice/{id}/payment/{pid}/destroy', 'InvoiceController@paymentDestroy')->name('invoice.payment.destroy');
    Route::get('invoice/items', 'InvoiceController@items')->name('invoice.items');

    Route::resource('invoice', 'InvoiceController');
    Route::get('invoice/create/{cid}', 'InvoiceController@create')->name('invoice.create');
}
);

Route::get(
    '/invoices/preview/{template}/{color}', [
                                              'as' => 'invoice.preview',
                                              'uses' => 'InvoiceController@previewInvoice',
                                          ]
);
Route::post(
    '/invoices/template/setting', [
                                    'as' => 'template.setting',
                                    'uses' => 'InvoiceController@saveTemplateSettings',
                                ]
);

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){


    Route::get('credit-note', 'CreditNoteController@index')->name('credit.note');
    Route::get('custom-credit-note', 'CreditNoteController@customCreate')->name('invoice.custom.credit.note');
    Route::post('custom-credit-note', 'CreditNoteController@customStore')->name('invoice.custom.credit.note');
    Route::get('credit-note/invoice', 'CreditNoteController@getinvoice')->name('invoice.get');
    Route::get('invoice/{id}/credit-note', 'CreditNoteController@create')->name('invoice.credit.note');
    Route::post('invoice/{id}/credit-note', 'CreditNoteController@store')->name('invoice.credit.note');
    Route::get('invoice/{id}/credit-note/edit/{cn_id}', 'CreditNoteController@edit')->name('invoice.edit.credit.note');
    Route::put('invoice/{id}/credit-note/edit/{cn_id}', 'CreditNoteController@update')->name('invoice.edit.credit.note');
    Route::delete('invoice/{id}/credit-note/delete/{cn_id}', 'CreditNoteController@destroy')->name('invoice.delete.credit.note');

}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){


    Route::get('debit-note', 'DebitNoteController@index')->name('debit.note');
    Route::get('custom-debit-note', 'DebitNoteController@customCreate')->name('bill.custom.debit.note');
    Route::post('custom-debit-note', 'DebitNoteController@customStore')->name('bill.custom.debit.note');
    Route::get('debit-note/bill', 'DebitNoteController@getbill')->name('bill.get');
    Route::get('bill/{id}/debit-note', 'DebitNoteController@create')->name('bill.debit.note');
    Route::post('bill/{id}/debit-note', 'DebitNoteController@store')->name('bill.debit.note');
    Route::get('bill/{id}/debit-note/edit/{cn_id}', 'DebitNoteController@edit')->name('bill.edit.debit.note');
    Route::put('bill/{id}/debit-note/edit/{cn_id}', 'DebitNoteController@update')->name('bill.edit.debit.note');
    Route::delete('bill/{id}/debit-note/delete/{cn_id}', 'DebitNoteController@destroy')->name('bill.delete.debit.note');

}
);


Route::get(
    '/bill/preview/{template}/{color}', [
                                          'as' => 'bill.preview',
                                          'uses' => 'BillController@previewBill',
                                      ]
);
Route::post(
    '/bill/template/setting', [
                                'as' => 'bill.template.setting',
                                'uses' => 'BillController@saveBillTemplateSettings',
                            ]
);

Route::resource('taxes', 'TaxController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('revenue/index', 'RevenueController@index')->name('revenue.index')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('revenue', 'RevenueController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::get('bill/pdf/{id}', 'BillController@bill')->name('bill.pdf')->middleware(['XSS',]);
Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::get('bill/{id}/duplicate', 'BillController@duplicate')->name('bill.duplicate');
    Route::get('bill/{id}/shipping/print', 'BillController@shippingDisplay')->name('bill.shipping.print');
    Route::get('bill/index', 'BillController@index')->name('bill.index');
    Route::post('bill/product/destroy', 'BillController@productDestroy')->name('bill.product.destroy');
    Route::post('bill/product', 'BillController@product')->name('bill.product');
    Route::post('bill/vender', 'BillController@vender')->name('bill.vender');
    Route::get('bill/{id}/sent', 'BillController@sent')->name('bill.sent');
    Route::get('bill/{id}/resent', 'BillController@resent')->name('bill.resent');
    Route::get('bill/{id}/payment', 'BillController@payment')->name('bill.payment');
    Route::post('bill/{id}/payment', 'BillController@createPayment')->name('bill.payment');
    Route::post('bill/{id}/payment/{pid}/destroy', 'BillController@paymentDestroy')->name('bill.payment.destroy');
    Route::get('bill/items', 'BillController@items')->name('bill.items');

    Route::resource('bill', 'BillController');
    Route::get('bill/create/{cid}', 'BillController@create')->name('bill.create');
}
);


Route::get('payment/index', 'PaymentController@index')->name('payment.index')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('payment', 'PaymentController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('expenses', 'ExpenseController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::get('report/transaction', 'TransactionController@index')->name('transaction.index');


}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::get('report/income-summary', 'ReportController@incomeSummary')->name('report.income.summary');
    Route::get('report/expense-summary', 'ReportController@expenseSummary')->name('report.expense.summary');
    Route::get('report/income-vs-expense-summary', 'ReportController@incomeVsExpenseSummary')->name('report.income.vs.expense.summary');
    Route::get('report/tax-summary', 'ReportController@taxSummary')->name('report.tax.summary');
    Route::get('report/profit-loss-summary', 'ReportController@profitLossSummary')->name('report.profit.loss.summary');

    Route::get('report/invoice-summary', 'ReportController@invoiceSummary')->name('report.invoice.summary');
    Route::get('report/bill-summary', 'ReportController@billSummary')->name('report.bill.summary');

    Route::get('report/invoice-report', 'ReportController@invoiceReport')->name('report.invoice');
    Route::get('report/account-statement-report', 'ReportController@accountStatement')->name('report.account.statement');

    Route::get('report/balance-sheet', 'ReportController@balanceSheet')->name('report.balance.sheet');
    Route::get('report/ledger', 'ReportController@ledgerSummary')->name('report.ledger');
    Route::get('report/trial-balance', 'ReportController@trialBalanceSummary')->name('trial.balance');
}
);


Route::get('proposal/pdf/{id}', 'ProposalController@proposal')->name('proposal.pdf')->middleware(['XSS',]);
Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::get('proposal/{id}/status/change', 'ProposalController@statusChange')->name('proposal.status.change');
    Route::get('proposal/{id}/convert', 'ProposalController@convert')->name('proposal.convert');
    Route::get('proposal/{id}/duplicate', 'ProposalController@duplicate')->name('proposal.duplicate');
    Route::post('proposal/product/destroy', 'ProposalController@productDestroy')->name('proposal.product.destroy');
    Route::post('proposal/customer', 'ProposalController@customer')->name('proposal.customer');
    Route::post('proposal/product', 'ProposalController@product')->name('proposal.product');
    Route::get('proposal/items', 'ProposalController@items')->name('proposal.items');
    Route::get('proposal/{id}/sent', 'ProposalController@sent')->name('proposal.sent');
    Route::get('proposal/{id}/resent', 'ProposalController@resent')->name('proposal.resent');

    Route::resource('proposal', 'ProposalController');
    Route::get('proposal/create/{cid}', 'ProposalController@create')->name('proposal.create');
}
);

Route::get(
    '/proposal/preview/{template}/{color}', [
                                              'as' => 'proposal.preview',
                                              'uses' => 'ProposalController@previewProposal',
                                          ]
);
Route::post(
    '/proposal/template/setting', [
                                    'as' => 'proposal.template.setting',
                                    'uses' => 'ProposalController@saveProposalTemplateSettings',
                                ]
);

Route::resource('contracts', 'ContractController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('leads', 'LeadController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('lead-sources', 'LeadSourceController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('lead-status', 'LeadStatusController')->middleware(
    [
        'auth',
        'XSS',
    ]
);


Route::resource('contract-types', 'ContractTypeController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::resource('goal', 'GoalController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('account-assets', 'AssetController')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::resource('custom-field', 'CustomFieldController')->middleware(
    [
        'auth',
        'XSS',
    ]
);

Route::post('chart-of-account/subtype', 'ChartOfAccountController@getSubType')->name('charofAccount.subType')->middleware(
    [
        'auth',
        'XSS',
    ]
);
Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::resource('chart-of-account', 'ChartOfAccountController');

}
);


Route::group(
    [
        'middleware' => [
            'auth',
            'XSS',
        ],
    ], function (){

    Route::post('journal-entry/account/destroy', 'JournalEntryController@accountDestroy')->name('journal.account.destroy');
    Route::resource('journal-entry', 'JournalEntryController');

}
);
