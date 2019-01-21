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

class CreateRssTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rss', function(Blueprint $table)
		{
			$table->integer('id');
			$table->integer('position')->default(0);
			$table->string('name')->default('Default');
			$table->integer('user_id')->default(1)->index();
			$table->integer('staff_id')->default(0)->index();
			$table->boolean('is_private')->default(0)->index();
			$table->boolean('is_torrent')->default(0)->index();
			$table->text('json_torrent');
			$table->softDeletes();
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
		Schema::drop('rss');
	}

}
