<div>
    @livewire('livewire')
    @foreach($students as $student)
        <li>{{$student->name}}</li>
        @endforeach
</div>
