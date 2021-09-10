{{> header}}

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Choose Time Frame
                        </a>
                    </li>
                    <form id="myform" action="/analytics/execute" enctype="multipart/form-data" method="get">
                        <input type="hidden" value="1" name="createdAndCompleted">
                        <li class="nav-item">
                            <input type="date" style="margin-left: 7%; margin-bottom: 5px; margin-right: 7%"
                                   name="date2" required>
                        </li>
                        <li class="nav-item">
                            <input type="date" style="margin-left: 7%; margin-bottom: 5px; margin-right: 7%"
                                   name="date1" required>
                        </li>

                        <li class="nav-item">
                            <a onclick="document.getElementById('myform').submit()"
                               style="margin-left: 7%; margin-right: 7%" class="nav-link active border border-primary"
                               aria-current="page" href="#">
                                <span data-feather="home"></span>
                                Search
                            </a>
                        </li>
                    </form>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">
                            <span data-feather="home"></span>
                            Filters
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                           href="/analytics/execute?createdAndCompleted=1&date1={{date1}}&date2={{date2}}">
                            <span data-feather="home"></span>
                            Created And Completed
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page"
                           href="/analytics/execute?created=1&date1={{date1}}&date2={{date2}}">
                            <span data-feather="home"></span>
                            Created
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page"
                           href="/analytics/execute?completed=1&date1={{date1}}&date2={{date2}}">
                            <span data-feather="home"></span>
                            Completed
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Analytics</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a type="button" href="/" class="btn btn-sm btn-outline-secondary">Go To All Tasks
                        </a>
                    </div>

                </div>
            </div>

            {{#created}}
            <h4 class="h6">Tasks Created Between '{{date2}}' and '{{date1}}'</h4>
            {{/created}}

            {{#completed}}
            <h4 class="h6">Tasks Completed Between '{{date2}}' and '{{date1}}'</h4>
            {{/completed}}

            {{#createdAndCompleted}}
            <h4 class="h6">Tasks Created and Completed Between '{{date2}}' and '{{date1}}'</h4>
            {{/createdAndCompleted}}

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Check</th>
                        <th scope="col">Date</th>
                        <th scope="col">Completed at</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{#created}}
                    {{#tasksCreated}}
                    <tr class="row1">
                        <td>{{id}}</td>
                        <td>{{name}}</td>
                        <td><input type="checkbox" checked disabled></td>
                        <td>{{created_at}}</td>
                        <td>{{completed_at}}</td>
                    </tr>
                    {{/tasksCreated}}
                    {{/created}}
                    {{#completed}}
                    {{#tasksCompleted}}
                    <tr class="row1">
                        <td>{{id}}</td>
                        <td>{{name}}</td>
                        <td><input type="checkbox" checked disabled></td>
                        <td>{{created_at}}</td>
                        <td>{{completed_at}}</td>
                    </tr>
                    {{/tasksCompleted}}
                    {{/completed}}
                    {{#createdAndCompleted}}
                    {{#tasksCreatedAndCompleted}}
                    <tr class="row1">
                        <td>{{id}}</td>
                        <td>{{name}}</td>
                        <td><input type="checkbox" checked disabled></td>
                        <td>{{created_at}}</td>
                        <td>{{completed_at}}</td>
                    </tr>
                    {{/tasksCreatedAndCompleted}}
                    {{/createdAndCompleted}}

                    <tr style="background-color: royalblue" >
                        <td style="color: white">TOTAL</td>
                        <td style="color: white" ></td>
                        <td style="color: white"></td>
                        <td style="color: white"></td>
                        <td class="total" style="color: white"></td>
                    </tr>

                    </tbody>
            </div>


        </main>
    </div>
</div>


<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>
</html>


{{> footer}}