@extends('layouts.app')

@section('title', 'Suscripción')

@section('header_type', 'gradient')

@section('content')

{!! Form::open(['method' =>'post', 'route'=> 'register', 'role' => 'form']) !!}

<div id="registro">

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Selecciona tu Plan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Datos de Registro</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    @csrf

    @foreach($plans as $plan)
        <label for="{{$plan->id}}">{{$plan->name}}</label>
        {{Form::radio('plan', $plan->id)}}

        <br>
    @endforeach
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  
    {!! Form::email('email',null,
    [
    'placeholder'=>'Correo electrónico',
    'required' => 'required',
    'value' => 'old("email")'
    ]) !!}<br>

    {!! Form::password('password',
    [
    'placeholder' => 'Contraseña',
    'required' => 'required',
    'value' => old("password")
    ]) !!}<br>

    {!! Form::password('password_confirmation',
    [
    'placeholder' => 'Confirmar Contraseña',
    'required' => 'required',
    'value' => old("password_confirmation")
    ]) !!}<br>

    {!! Form::text('name',null,
    [
    'placeholder'=>'Nombres',
    'required' => 'required',
    'value' => 'old("name")'
    ]) !!}<br>

    {!! Form::text('lastname',null,
    [
    'placeholder'=>'Apellidos',
    'required' => 'required',
    'value' => 'old("lastname")'
    ]) !!}<br>

    {!! Form::text('nationality',null,
    [
    'placeholder'=>'Nacionalidad',
    'required' => 'required',
    'value' => 'old("nationality")'
    ]) !!}<br>

    {!! Form::text('address',null,
    [
    'placeholder'=>'Dirección',
    'required' => 'required',
    'value' => 'old("address")'
    ]) !!}<br>

    {!! Form::text('city',null,
    [
    'placeholder'=>'Ciudad',
    'required' => 'required',
    'value' => 'old("city")'
    ]) !!}<br>

    {!! Form::text('country',null,
    [
    'placeholder'=>'País',
    'required' => 'required',
    'value' => 'old("country")'
    ]) !!}<br>

    {!! Form::text('document',null,
    [
    'placeholder'=>'Documento',
    'required' => 'required',
    'value' => 'old("document")'
    ]) !!}<br>

    {!! Form::text('phone',null,
    [
    'placeholder'=> 'Teléfono',
    'required' => 'required',
    'value' => 'old("phone")'
    ]) !!}<br>


    {!! Form::text('abilities',null,
    [
    'placeholder'=>'Habilidades',
    'required' => 'required',
    'value' => 'old("abilities")'
    ]) !!}<br>

    {!! Form::button('Registrar',['class'=>'btn-submit','type'=>'button']) !!}
  </div>
</div>

{!! Form::close() !!}

</div>

<div id="talentos" hidden>
    <h1> Elige tus talentos </h1>
    
    {!! Form::open(['method' =>'post', 'route'=> 'register', 'role' => 'form']) !!}

    {!! Form::text('title',null,
    [
    'placeholder'=>'Talento',
    'required' => 'required',
    'value' => 'old("title")'
    ]) !!}<br>

    {!! Form::text('industry',null,
    [
    'placeholder'=>'Industria',
    'required' => 'required',
    'value' => 'old("industry")'
    ]) !!}<br>

    {!! Form::text('subcategory',null,
    [
    'placeholder'=>'Subcategoria',
    'required' => 'required',
    'value' => 'old("subcategory")'
    ]) !!}<br>

    {!! Form::text('level',null,
    [
    'placeholder'=>'Nivel',
    'required' => 'required',
    'value' => 'old("level")'
    ]) !!}<br>


    {!! Form::text('description',null,
    [
    'placeholder'=>'Descripción',
    'required' => 'required',
    'value' => 'old("description")'
    ]) !!}<br>

    {!! Form::button('Agregar',['class'=>'btn-submit-talent','type'=>'button']) !!}


    {!! Form::close() !!}
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.btn-submit').click(function(e){

        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var name = $("input[name='name']").val();
        var lastname = $("input[name='lastname']").val();
        var email = $("input[name='email']").val();
        var nationality = $("input[name='nationality']").val();
        var address = $("input[name='address']").val();
        var city = $("input[name='city']").val();
        var country = $("input[name='country']").val();
        var documento = $("input[name='document']").val();
        var password = $("input[name='password']").val();
        var phone = $("input[name='phone']").val();
        var abilities = $("input[name='abilities']").val();
        var password_confirmation = $("input[name='password_confirmation']").val();
        var plan = $("input[name='plan']").val();


        $.ajax({
           type:'POST',
           url:'register',
           data:{
            name:name,
            lastname:lastname,
            email:email,
            nationality:nationality,
            password:password,
            password_confirmation:password_confirmation,
            address:address,
            city:city,
            country:country,
            document:documento,
            phone:phone, abilities:abilities,
            _token:_token,
            plan:plan },
           success:function(data){
              alert(data.success);
              $('#registro').hide();
              $('#talentos').removeAttr('hidden');

           }
        });
        });
    });
</script>

@endsection