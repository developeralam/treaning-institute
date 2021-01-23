@if ($errors->any())
 @foreach ($errors->all() as $error)
                   <div class="alert alert-danger">
                    <button type="button" arial-hidden="true" class='close' 
                    onclick="this.parentElement.style.display='none'">x </button> <span>{{ $error }}</span>
                   </div>
            @endforeach
                 @endif


                 
           @if(session('successMsg'))
             <div class="alert alert-success" style="height: fit-content;">
                <button type="button" arial-hidden="true" class='close' 
                onclick="this.parentElement.style.display='none'"> x </button> <span>{{ session('successMsg')}}</span>
              </div>       
        @endif                   