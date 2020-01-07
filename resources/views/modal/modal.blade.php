{{-- MODAL to add question --}}
    <div class="modal fade" id="createQueModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Ask Here</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('question.store')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="md-form mb-2">
                        <input type="text" value="" style="font-weight: bold;" name="question" id="orangeForm-name" class="form-control validate" placeholder="Ask Your Question" required>
                    </div>
                    <div class="">
                        <label for="tags">Tags</label>
                        <select class="form-control validate tags_selector2" name="tags[]" id="tags" multiple required>
                            @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary askSubmit">Add Question</button>
                </div>
            </form>
            </div>
        </div>
    </div>  
