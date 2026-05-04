<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DBController extends Controller
{
    // db queries
    public function DBQueries(){
    if(!Schema::hasColumn('transactions','data')){
        Schema::table('transactions',function($table){
            $table->json('data')->after('json')->nullable();
        });

    }

    if(!Schema::hasColumn('users','ref')){
        Schema::table('users',function($table){
                $table->string('ref')->after('phone')->nullable();
        });
    }

    if(!Schema::hasColumn('users','affiliate_balance')){
        Schema::table('users',function($table){
                $table->float('affiliate_balance')->after('main_balance')->default(0);
                $table->float('activities_balance')->after('affiliate_balance')->default(0);
        });
    }

    if(!Schema::hasColumn('users','socials')){
        Schema::table('users',function($table){
                $table->json('socials')->default(json_encode([
                'facebook' => null,
                'tiktok' => null,
                'instagram' => null,
                'twitter' => null,
                'whatsapp' => null,
                'telegram' => null
                ]));
        });
    }

    if(!Schema::hasColumn('users','bank')){
        Schema::table('users',function($table){
            $table->json('bank')->after('json')->default(json_encode([
                'account_number' => null,
                'bank_name' => null,
                'account_name' => null
            ]));
        });
    }

    if(!Schema::hasColumn('users','package')){
        Schema::table('users',function($table){
                $table->string('package')->after('uniqid')->default('free');
        });
    }

    if(!Schema::hasTable('tasks')){
        Schema::create('tasks',function($table){
            $table->id();
            $table->string('uniqid')->nullable();
            $table->bigInteger('user_id');
            $table->json('type')->nullable();
            $table->string('link')->nullable();
            $table->string('status')->default('success');
            $table->timestamp('updated')->useCurrent();
            $table->timestamp('date')->useCurrent();
        });
    }

    if(!Schema::hasColumn('tasks','caption')){
        Schema::table('tasks',function($table){
            $table->text('caption')->after('link')->nullable();
            $table->string('banner')->after('caption')->nullable();
        });
    }

    if(!Schema::hasTable('task_categories')){
        Schema::create('task_categories',function($table){
              $table->id();
                $table->string('uniqid')->nullable();
                $table->string('name')->nullable();
                $table->float('cost')->default(0);
                $table->float('earning')->default(0);
                $table->string('platform')->nullable();
                $table->bigInteger('members')->nullable();
                $table->string('status')->default('active');
                $table->timestamp('updated')->useCurrent();
                $table->timestamp('date')->useCurrent();
        });
    }

    if(!Schema::hasTable('task_proofs')){
        Schema::create('task_proofs',function($table){
                $table->id();
                $table->string('uniqid');
                $table->bigInteger('user_id');
                $table->json('task')->comment('the task performed in json format fetched from task table based on task id submitted');
               $table->json('proofs')->nullable()->comment('The prrofs submitted in json format');
                $table->json('json')->nullable()->comment('added details');
                $table->string('status')->default('success');
                $table->timestamp('updated')->useCurrent();
                $table->timestamp('date')->useCurrent();

        });
    }

    if(!Schema::hasColumn('tasks','limit')){
        Schema::table('tasks',function($table){
                    $table->bigInteger('limit')->after('type')->default(100)->comment('The total proofs needed');
                    $table->bigInteger('proofs')->after('limit')->default(0)->comment('The total proofs submitted');
        });
    }

    if(!Schema::hasColumn('users','upgraded')){
        Schema::table('users',function($table){
            $table->string('upgraded')->default('no')->comment('Updates to yes if the user is upgraded and no if not');
        });
    }

    if(!Schema::hasTable('gift_codes')){
        Schema::create('gift_codes',function($table){
                $table->id();
                $table->string('uniqid');
                $table->string('code')->comment('The gift code');
                $table->bigInteger('value')->comment('The gift code value');
                $table->bigInteger('limit')->default(100)->comment('The gift code limit i.e total users before being invalid');
                $table->bigInteger('redeemed')->default(0)->comment('Totla units redeemed');
                $table->json('json')->nullable()->comment('Added details');
                $table->timestamp('updated')->useCurrent();
                $table->timestamp('date')->useCurrent();
        });
    }
    if(!Schema::hasColumn('gift_codes','status')){
        Schema::table('gift_codes',function($table){
                    $table->string('status')->default('active');
        });
    }

    if(!Schema::hasTable('redeemed_gift_codes')){
        Schema::create('redeemed_gift_codes',function($table){
            $table->id();
            $table->string('uniqid');
            $table->bigInteger('user_id')->comment('The user who redeemed the code');
            $table->json('gift_code')->nullable()->comment('Gift code json fetched from the gift codes table based on the code');
            $table->json('json')->nullable();
            $table->string('status')->default('success');
            $table->timestamp('updated')->useCurrent();
            $table->timestamp('date')->useCurrent();
        });
    }

    if(!Schema::hasTable('products')){
        Schema::create('products',function($table){
                    $table->id();
                    $table->string('uniqid');
                    $table->string('name')->comment('Product name');
                    $table->string('photo')->comment('The display photo');
                    $table->string('category')->comment('The product category');
                    $table->float('price')->comment('The product price');
                    $table->string('location')->comment('The location in state');
                    $table->text('address')->nullable()->comment('Address');
                    $table->string('status')->default('active');
                    $table->timestamp('updated')->useCurrent();
                    $table->timestamp('date')->useCurrent();
        });
    }

    if(!Schema::hasColumn('users','last_spin')){
        Schema::table('users',function($table){
            $table->timestamp('last_spin')->useCurrent()->comment('Last daily  spin time to track and make sure the users spin once daily');
        });
    }


    // return response
    return response()->json([
        'message' => 'All queries ran successful',
        'status' => 'success'
    ]);
    }
}
