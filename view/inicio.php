{{> header}}

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">To Do List</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="showTextBox()">New Task</button>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Check</th>
                        <th scope="col">Date</th>
                        <th scope="col">Completed at</th>
                        <th scope="col">Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{#completedTasks}}
                    <tr>
                        <td>{{id}}</td>
                        <td>{{name}}</td>
                        <td><input type="checkbox" checked disabled></td>
                        <td>{{created_at}}</td>
                        <td>{{completed_at}}</td>
                        <td></td>
                    </tr>
                    {{/completedTasks}}

                    {{#notCompletedTasks}}
                    <tr>
                        <td>{{id}}</td>
                        <td>{{name}}</td>
                        <td><input type="checkbox"></td>
                        <td>{{created_at}}</td>
                        <td></td>
                        <td><a data-toggle="modal" data-target="#delete1" type="button"><i class="fas fa-trash-alt" aria-hidden="true"></i></a></td>
                    </tr>
                    {{/notCompletedTasks}}
                    <form action="/toDoList/addTask" enctype="multipart/form-data" method="get">
                    <tr id="textBox" style="display: none">
                        <td>x</td>
                        <td><input type="text" required name="task" style="width: 100%"></td>
                        <td><button type="submit" style="border-radius: 50%"><i class="fas fa-check" style="color: green" aria-hidden="true"></i></button></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </form>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>


<div class="modal fade show" id="delete1" tabindex="-1" aria-labelledby="exampleModalLabel" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this task?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/ToDoList/" enctype="multipart/form-data" method="get"></form>
                <button type="submit" class="btn btn-danger btn-lg btn-block">YES</button>
                <button type="button" data-dismiss="modal" class="btn btn-dark btn-lg btn-block">NO</button>

            </div>
        </div>
    </div>
</div>

<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
</body>
</html>





{{> footer}}