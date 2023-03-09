<?php

namespace App\Http\Controllers;

use App\BalanceSheet;
use App\BankAccount;
use App\Bill;
use App\Blog;
use App\Goal;
use App\Invoice;
use App\Payment;
use App\ProductServiceCategory;
use App\ProductServiceUnit;
use App\Projects;
use App\Revenue;
use App\Tax;
use Illuminate\Support\Facades\Auth;

class
DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check())
        {
            if(\Auth::user()->can('show dashboard'))
            {
                $data['latestIncome']  = Revenue::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();
                $data['latestExpense'] = Payment::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();


                $incomeCategory = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 1)->get();
                $inColor        = array();
                $inCategory     = array();
                $inAmount       = array();
                for($i = 0; $i < count($incomeCategory); $i++)
                {
                    $inColor[]    = '#' . $incomeCategory[$i]->color;
                    $inCategory[] = $incomeCategory[$i]->name;
                    $inAmount[]   = $incomeCategory[$i]->incomeCategoryRevenueAmount();
                }


                $data['incomeCategoryColor'] = $inColor;
                $data['incomeCategory']      = $inCategory;
                $data['incomeCatAmount']     = $inAmount;


                $expenseCategory = ProductServiceCategory::where('created_by', '=', \Auth::user()->creatorId())->where('type', '=', 2)->get();
                $exColor         = array();
                $exCategory      = array();
                $exAmount        = array();
                for($i = 0; $i < count($expenseCategory); $i++)
                {
                    $exColor[]    = '#' . $expenseCategory[$i]->color;
                    $exCategory[] = $expenseCategory[$i]->name;
                    $exAmount[]   = $expenseCategory[$i]->expenseCategoryAmount();
                }

                $data['expenseCategoryColor'] = $exColor;
                $data['expenseCategory']      = $exCategory;
                $data['expenseCatAmount']     = $exAmount;

                $data['incExpBarChartData']  = \Auth::user()->getincExpBarChartData();
                $data['incExpLineChartData'] = \Auth::user()->getIncExpLineChartDate();

                $data['currentYear']  = date('Y');
                $data['currentMonth'] = date('M');

                $constant['taxes']         = Tax::where('created_by', \Auth::user()->creatorId())->count();
                $constant['category']      = ProductServiceCategory::where('created_by', \Auth::user()->creatorId())->count();
                $constant['units']         = ProductServiceUnit::where('created_by', \Auth::user()->creatorId())->count();
                $constant['bankAccount']   = BankAccount::where('created_by', \Auth::user()->creatorId())->count();
                $data['constant']          = $constant;
                $data['bankAccountDetail'] = BankAccount::where('created_by', '=', \Auth::user()->creatorId())->get();
                $data['recentInvoice']     = Invoice::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();
                $data['weeklyInvoice']     = \Auth::user()->weeklyInvoice();
                $data['monthlyInvoice']    = \Auth::user()->monthlyInvoice();
                $data['recentBill']        = Bill::where('created_by', '=', \Auth::user()->creatorId())->orderBy('id', 'desc')->limit(5)->get();
                $data['weeklyBill']        = \Auth::user()->weeklyBill();
                $data['monthlyBill']       = \Auth::user()->monthlyBill();
                $data['goals']             = Goal::where('created_by', '=', \Auth::user()->creatorId())->where('is_display', 1)->get();


            }
            else
            {
                $data = [];
            }

            return view('dashboard.index', $data);
        }
        else
        {
            if(!file_exists(storage_path() . "/installed"))
            {
                header('location:install');
                die;
            }
            else
            {
                $blog = Blog::limit(3)->get();
                return view('layouts.landing',compact('blog'));
                //return redirect('login');
            }
        }
    }

}

