<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();//unsigned()は符号なし：正の数のみ
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            /**user_idを外部キーとする。
             * users テーブルの id カラムを参照する。
             * userの削除時はそれを参照しているproductも連鎖的に削除する。
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_user_id_foreign');
            /**ロールバック時,user_idカラムを削除することになるが、
             * 外部キー制約がついているカラムはそのままでは削除できない。
             * したがって先に外部キー制約を削除する。
             */ 
            $table->dropColumn('user_id');  
            //外部キー制約を削除の後に、user_idカラムを削除する。
        });
    }
}
