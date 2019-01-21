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

class CreatePeersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('peers', function(Blueprint $table)
		{
			$table->bigInteger('id');
			$table->string('peer_id', 60)->nullable();
			$table->string('md5_peer_id')->nullable();
			$table->string('info_hash')->nullable();
			$table->string('ip')->nullable();
			$table->smallInteger('port')->nullable();
			$table->string('agent')->nullable();
			$table->bigInteger('uploaded')->nullable();
			$table->bigInteger('downloaded')->nullable();
			$table->bigInteger('left')->nullable();
			$table->boolean('seeder')->nullable();
			$table->bigInteger('torrent_id')->nullable()->index();
			$table->integer('user_id')->nullable()->index();
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
		Schema::drop('peers');
	}

}
