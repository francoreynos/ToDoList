{{> header}}

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>
                            Options
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ToDoList/">
                            <span data-feather="file"></span>
                            All Tasks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ToDoList/checkedTasks">
                            <span data-feather="file"></span>
                            Checked Tasks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ToDoList/uncheckedTasks">
                            <span data-feather="file"></span>
                            Not Checked Tasks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/ToDoList/deletedTasks">
                            <span data-feather="file"></span>
                            Deleted Tasks
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">To Do List</h1>
                {{#completedTitle}}
                <h1>Completed</h1>
                {{/completedTitle}}
                {{#notCompletedTitle}}
                <h1>Not Completed</h1>
                {{/notCompletedTitle}}
                {{#deletedTitle}}
                <h1>Deleted</h1>
                {{/deletedTitle}}
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a type="button" href="#textBox" class="btn btn-sm btn-outline-secondary" onclick="showTextBox()">New
                            Task
                        </a>
                    </div>
                    <a type="button" href="/Analytics/execute?createdAndCompleted=1" class="btn btn-sm btn-outline-secondary">
                        Analytics
                    </a>

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
                        <td><a data-toggle="modal" data-target="#uncheck{{id}}" type="button"><i
                                        class="fas fa-history"></i></a></td>
                    </tr>

                    <div class="modal fade show" id="uncheck{{id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel{{id}}"
                         style="display: none;"
                         aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{id}}">Are you sure you want to
                                        UnCheck this
                                        task?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/ToDoList/uncheckTask" enctype="multipart/form-data" method="get">
                                        <input type="hidden" value="{{id}}" name="id">
                                        <button type="submit" class="btn btn-lg btn-block">YES</button>
                                        <button type="button" data-dismiss="modal"
                                                class="btn btn-dark btn-lg btn-block">
                                            NO
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{/completedTasks}}

                    {{#notCompletedTasks}}
                    <form action="/toDoList/checkTask" enctype="multipart/form-data" method="get">
                        <tr>
                            <td>{{id}}<input type="hidden" value="{{id}}" name="id"></td>
                            <td>{{name}}</td>
                            <td><input type="checkbox" name="status" value="1" required> <input type="submit"
                                                                                                value="Check"></input>
                            </td>
                            <td>{{created_at}}</td>
                            <td></td>
                            <td><a data-toggle="modal" data-target="#delete{{id}}" type="button"><i
                                            class="fas fa-trash-alt"
                                            aria-hidden="true"></i></a>
                            </td>
                        </tr>
                    </form>

                    <div class="modal fade show" id="delete{{id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel{{id}}" style="display: none;"
                         aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{id}}">Are you sure you want to delete
                                        this task?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/ToDoList/deleteTask" enctype="multipart/form-data" method="get">
                                        <input type="hidden" value="{{id}}" name="id">
                                        <button type="submit" class="btn btn-danger btn-lg btn-block">YES</button>
                                        <button type="button" data-dismiss="modal"
                                                class="btn btn-dark btn-lg btn-block">NO
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{/notCompletedTasks}}
                    {{#deletedTasks}}

                    <tr>
                        <td>{{id}}</td>
                        <td>{{name}}</td>
                        <td><input type="checkbox" disabled></td>
                        <td>{{created_at}}</td>
                        <td>{{completed_at}}</td>
                        <td></i></a></td>
                    </tr>

                    {{/deletedTasks}}
                    <form action="/toDoList/addTask" enctype="multipart/form-data" method="get">
                        <tr id="textBox" style="display: none">
                            <td>x</td>
                            <td><input type="text" required name="task" style="width: 100%"></td>
                            <td>
                                <button type="submit" style="border-radius: 50%"><i class="fas fa-check"
                                                                                    style="color: green"
                                                                                    aria-hidden="true"></i></button>
                            </td>
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