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

class CreatePrivateMessagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('private_messages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sender_id')->index();
			$table->integer('receiver_id')->index('private_messages_reciever_id_index');
			$table->string('subject');
			$table->text('message');
			$table->boolean('read')->default(0);
			$table->integer('related_to')->nullable();
			$table->timestamps();
			$table->index(['sender_id','read']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('private_messages');
	}

}
