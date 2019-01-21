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

class CreateRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('requests', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('name');
			$table->integer('category_id')->index();
			$table->string('type');
			$table->string('imdb')->nullable()->index('imdb');
			$table->string('tvdb')->nullable()->index('tvdb');
			$table->string('tmdb')->nullable()->index('tmdb');
			$table->string('mal')->nullable()->index('mal');
			$table->text('description');
			$table->integer('user_id')->index();
			$table->float('bounty', 22);
			$table->integer('votes')->default(0);
			$table->boolean('claimed')->nullable();
			$table->boolean('anon')->default(0);
			$table->integer('filled_by')->nullable()->index();
			$table->string('filled_hash')->nullable()->index();
			$table->dateTime('filled_when')->nullable();
			$table->boolean('filled_anon')->default(0);
			$table->integer('approved_by')->nullable()->index();
			$table->dateTime('approved_when')->nullable();
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
		Schema::drop('requests');
	}

}
