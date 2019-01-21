<?php
/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D is open-sourced software licensed under the GNU General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 *
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 * @author     HDVinnie
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->index();
			$table->string('agent')->nullable();
			$table->string('info_hash')->index();
			$table->bigInteger('uploaded')->nullable();
			$table->bigInteger('actual_uploaded')->nullable();
			$table->bigInteger('client_uploaded')->nullable();
			$table->bigInteger('downloaded')->nullable();
			$table->bigInteger('actual_downloaded')->nullable();
			$table->bigInteger('client_downloaded')->nullable();
			$table->boolean('seeder')->default(0)->index();
			$table->boolean('active')->default(0)->index();
			$table->bigInteger('seedtime')->default(0)->index();
			$table->boolean('immune')->default(0)->index();
			$table->boolean('hitrun')->default(0)->index();
			$table->boolean('prewarn')->default(0)->index();
			$table->dateTime('completed_at')->nullable();
            $table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('history');
	}

}
