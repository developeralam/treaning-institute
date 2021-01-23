@if ($errors->any())
 @foreach ($errors->all() as $error)
                   <div class="alert alert-danger">
                    <button type="button" arial-hidden="true" class='close' 
                    onclick="this.parentElement.style.display='none'">x </button> <span>{{ $error }}</span>
                   </div>
            @endforeach
                 @endif


                 
           @if(session('successMsg'))
             <div class="alert alert-success">
                <button type="button" arial-hidden="true" class='close' 
                onclick="this.parentElement.style.display='none'"> x </button> <strong>Success! </strong>  <span>{{ session('successMsg')}}</span>
              </div>       
        @endif
           @if(session('error'))
             <div class="alert alert-error">
                <button type="button" arial-hidden="true" class='close'
                onclick="this.parentElement.style.display='none'"> x </button> <strong>Error! </strong>  <span>{{ session('error')}}</span>
              </div>
        @endif