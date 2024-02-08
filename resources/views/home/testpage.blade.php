<x-home.layout>

    <div class="container">
        <div class="email-artisan m-3 p-3 border shadow ">
            <form action="{{ route('emai.artisan') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="user" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="user"
                        id="user"
                        aria-describedby="helpId"
                        placeholder="Enter User's email address whom you want to send a mail "
                    />
                </div>
                
                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Send
                </button>
            </form>

            <div class="testNotification">
                <a href="{{ route('testNotification') }} " class="btn btn-sm btn-danger">Test Notification</a>
            </div>


        </div>
    </div>


</x-home.layout>