
@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        @php
            $count = 1;
        @endphp
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="font-weight-bold">All Questions with their Answers</h4>
                        <div class="mb-3">
                            <a href="{{ route('knowledgeBase.create') }}" class="btn btn-success">Create</a>
                        </div>
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead class="bg-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($knowledgebases as $knowledgebase)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{ $knowledgebase->question }}</td>
                                    <td>{{ $knowledgebase->answer }}</td>
                                    <td>{{ $knowledgebase->created_at }}</td>
                                    <td>
                                        <a href="{{ route('knowledgeBase.edit', $knowledgebase->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('knowledgeBase.destroy', $knowledgebase->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
