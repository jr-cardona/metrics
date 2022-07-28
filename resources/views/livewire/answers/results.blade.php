<div>
    @foreach($this->participant->answers as $answer)
        <h2>{{ $answer->question->title }}</h2>
        <h2>{{ $answer->value }}</h2>
    @endforeach
</div>
