<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form method="POST" action="{{ route('jobSearchHome') }}" enctype="multipart/form-data">
            @csrf
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input name="keyword" type="text" class="form-control border-0" placeholder="Keyword" />
                    </div>
                    <div class="col-md-4">
                        <select name="category" class="form-select border-0">
                            <option selected value="0">Select Category</option>
                            <option value="1">Marketing</option>
                            <option value="2">Customer Service</option>
                            <option value="3">Human Resource</option>
                            <option value="4">Project Management</option>
                            <option value="5">Business Development</option>
                            <option value="6">Sales & Communication</option>
                            <option value="7">Teaching & Education</option>
                            <option value="8">Design & Creative</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input name="location" type="text" class="form-control border-0" placeholder="Enter Location!">
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100" type="submit">Search</button>
            </div>
        </div>
        </form>
    </div>
</div>