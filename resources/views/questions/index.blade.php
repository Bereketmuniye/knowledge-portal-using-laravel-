@extends('layouts.app')
@section('content')
<style>
    .section_padding_130 {
        padding-top: 130px;
        padding-bottom: 130px;
    }

    .faq_area {
        position: relative;
        z-index: 1;
        background-color: #f5f5ff;
    }

    .faq-accordian {
        position: relative;
        z-index: 1;
    }

    .faq-accordian .card {
        position: relative;
        z-index: 1;
        margin-bottom: 1.5rem;
    }

    .faq-accordian .card:last-child {
        margin-bottom: 0;
    }

    .faq-accordian .card .card-header {
        background-color: #ffffff;
        padding: 0;
        border-bottom-color: #ebebeb;
    }

    .faq-accordian .card .card-header h4 {
        cursor: pointer;
        padding: 1.75rem 2rem;
        color: #3f43fd;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -ms-grid-row-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .faq-accordian .card .card-header h4 span {
        font-size: 1.5rem;
    }

    .faq-accordian .card .card-header h4.collapsed {
        color: #070a57;
    }

    .faq-accordian .card .card-header h4.collapsed span {
        -webkit-transform: rotate(-180deg);
        transform: rotate(-180deg);
    }

    .faq-accordian .card .card-body {
        padding: 1.75rem 2rem;
    }

    .faq-accordian .card .card-body p:last-child {
        margin-bottom: 0;
    }

    @media only screen and (max-width: 575px) {
        .support-button h4 {
            font-size: 14px;
            width: 30px;
        }
    }

    .support-button i {
        color: #3f43fd;
        font-size: 1.25rem;
    }

    @media only screen and (max-width: 575px) {
        .support-button i {
            font-size: 1rem;
        }
    }

    .support-button a {
        text-transform: capitalize;
        color: #2ecc71;
    }

    @media only screen and (max-width: 575px) {
        .support-button a {
            font-size: 13px;
        }

    }

</style>

<div class="faq_area section_padding_130" id="faq">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-lg-6">
                <!-- Section Heading-->
                <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <h3><span>Frequently </span> Asked Questions</h3>
                    <div class="line"></div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <!-- FAQ Area-->
            <div class="col-12 col-sm-10 col-lg-8">
                @foreach ($questions as $question)
                <div class="accordion faq-accordian" id="faqAccordion{{$question->id}}">
                    <div class="card border-0 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="card-header" id="heading{{$question->id}}">
                            <h4 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapse{{$question->id}}"
                                aria-expanded="true" aria-controls="collapse{{$question->id}}">
                                {{$question->body}}<span class="lni-chevron-up"></span>
                            </h4>
                        </div>
                        <div class="collapse" id="collapse{{$question->id}}" aria-labelledby="heading{{$question->id}}"
                            data-parent="#faqAccordion{{$question->id}}">
                            @foreach ($question->answers as $answer)
                            <div class="card-body">
                                <div class="mr-2">
                                    <h4><i class="fas fa-user-circle fa-lg"></i><strong>{{ $answer->answeredBy ? $answer->answeredBy->name : 'Anonymous' }}</strong></h4>
                                </div>
                                <div class="mr-3" style="margin-top: 20px">
                                    <p><strong>Answer: </strong>{{ $answer->body }}</p>
                                    <button class="btn btn-primary bg-primary btn-sm like-button" data-answer-id="{{ $answer->id }}">
                                        <i class="fas fa-thumbs-up"></i><span id="like-count-{{ $answer->id }}">{{ $answer->likes }}</span>
                                    </button>
                                    <button class="btn btn-danger btn-sm dislike-button" data-answer-id="{{ $answer->id }}">
                                        <i class="fas fa-thumbs-down"></i><span id="dislike-count-{{ $answer->id }}">{{ $answer->dislikes }}</span>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                            <form action="{{ route('answers.store', ['question' => $question->id]) }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input id="answerInput{{$question->id}}" name="body" type="text" class="form-control" placeholder="Enter your answer...">
                                    <button id="sendButton{{$question->id}}" class="btn btn-primary" type="submit" style="width: 100%;">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
             <div class="support-button mt-5 wow fadeInUp" data-wow-delay="0.5s">
                    <h4 class="mb-0 px-2 font-weight-italic">Can't find your answers?</h4>
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="body" placeholder="Enter your question...">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit" id="Button3" style="width: 100%;">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="{{ asset('js/like-dislike.js') }}"></script>  <meta name="csrf-token" content="{{ csrf_token() }}">


<script>
  function likeAnswer(answerId, event) {
  fetch(`/answers/${answerId}/like`, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Update like count in UI
      const likeCountElement = document.getElementById(`like-count-${answerId}`);
      likeCountElement.textContent = data.likeCount;

      // Optionally, highlight the liked button
      event.target.classList.add('liked'); // Add a class for styling
    } else {
      console.error('Error liking the answer:', data.message);
    }
  })
  .catch(error => {
    console.error('Error liking the answer:', error);
  });
}

function dislikeAnswer(answerId, event) {
  fetch(`/answers/${answerId}/dislike`, {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Update dislike count in UI
      const dislikeCountElement = document.getElementById(`dislike-count-${answerId}`);
      dislikeCountElement.textContent = data.dislikeCount;

      // Optionally, highlight the disliked button
      event.target.classList.add('disliked');
    } else {
      console.error('Error disliking the answer:', data.message);
    }
  })
  .catch(error => {
    console.error('Error disliking the answer:', error);
  });
}

</script>
@endsection
