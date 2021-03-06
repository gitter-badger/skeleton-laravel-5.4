{!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user]]) !!}

  <div class="form-group">
    {!! Form::label('name', __('users.attributes.name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('users.placeholder.name')]) !!}
  </div>

  <div class="form-group">
    {!! Form::label('email', __('users.attributes.email')) !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('users.placeholder.email')]) !!}
  </div>

  <div class="form-group">
    {!! Form::label('password', __('users.attributes.password')) !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('users.placeholder.password')]) !!}
  </div>

  <div class="form-group">
    {!! Form::label('password_confirmation', __('users.attributes.password_confirmation')) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => __('users.placeholder.password_confirmation')]) !!}
  </div>

  @can('update_roles', $user)
    <div class="form-group">
      {!! Form::label('roles', __('users.attributes.roles')) !!}

      @foreach($roles as $role)
        <div class="checkbox">
          <label>
            {!! Form::checkbox("roles[$role->id]", $role->id, $user->hasRole($role->name)) !!}
            @if (Lang::has('roles.' . $role->name))
              {!! __('roles.' . $role->name) !!}
            @else
              {{ ucfirst($role->name) }}
            @endif
          </label>
        </div>
      @endforeach
    </div>
  @endcan

  <div class="pull-right">
    <a href="{{ route('users.show', $user) }}" class="btn btn-default">{{ __('forms.actions.back') }}</a>
    {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-success']) !!}
  </div>

{!! Form::close() !!}
