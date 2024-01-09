use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadEmailTable extends Migration
{
public function up()
{
Schema::create('entidad_email', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('entidad_id');
$table->unsignedBigInteger('email_id');
$table->unique(['entidad_id', 'email_id']);
$table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade');
$table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
$table->timestamps();
});
}

public function down()
{
Schema::dropIfExists('entidad_email');
}
}
