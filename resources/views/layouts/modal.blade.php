{{-- 
 ==========================================================
 ||                Main Layout for the Modals            ||
 ==========================================================
 
 Description: 
 This is the main reusable modal for the Web Application if
 there are any modals to be use.

 
--}}

{{-- Modal for Editing --}}

@foreach ($tasks as $task)   
<!-- Modal -->
<div
    class="modal fade"
    id="editModalId{{$task->id}}"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Modal title
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form action="{{route('tasks.edit', $task->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="" class="form-label">Task Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="taskname"
                                id="taskname"
                                aria-describedby="helpId"
                                placeholder=""
                                value="{{$task->taskname}}" 
                            />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{$task->description}}</textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    var modalId = document.getElementById('modalId');

    modalId.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>

@endforeach