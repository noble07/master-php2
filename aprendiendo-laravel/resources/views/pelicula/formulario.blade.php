<h1>Formulario en Laravel</h1>
<form action="{{ action('PeliculaController@recibir') }}" method="POST">
  @csrf
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre">
  <br>
  <label for="email">Corre</label>
  <input type="email" name="email">
  <br>
  <input type="submit" value="Enviar">
</form>