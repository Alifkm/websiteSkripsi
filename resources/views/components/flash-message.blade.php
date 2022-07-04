@if (session()->has('message'))
      <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-success">
          {{ session('message') }}
      </div>
@elseif (session()->has('error'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif