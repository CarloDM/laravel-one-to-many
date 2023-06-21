

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete
              </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">conferma l eliminazione</h1>

                      </div>
                      <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <form
                      action="{{route('admin.posts.destroy', $post)}}"
                      onsubmit="return confirm('confermi l eliminazione del post:' {{$post->title}} )"
                      method="POST"
                      >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>

                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
