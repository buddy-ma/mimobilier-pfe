/**
* Reverse the migrations.
*/
public function down(): void
{
Schema::dropIfExists('annonces');
}
};