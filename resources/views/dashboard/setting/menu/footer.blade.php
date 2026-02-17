@extends('dashboard.master')

@section('title', 'Footer Menu Settings')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/menu-editor/css/styles.min.css') }}" />
@endpush

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Footer Menu</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item">Menus</li>
                        <li class="breadcrumb-item active">Footer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Manage Footer Links</h3>
                        </div>

                        <div class="card-body">
                            {{-- Alerts --}}
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    <p class="m-0">{{ session('success') }}</p>
                                </div>
                            @endif

                            {{-- Hidden Form for Submission --}}
                            <form method="POST" id="menuform"
                                action="{{ route('dashboard.settings.menus.footer.update') }}">
                                @csrf
                                <input type="hidden" id="menudata" name="menudata" value="" />
                            </form>

                            <div class="row">
                                {{-- Left Column: Menu Editor --}}
                                <div class="col-md-8">
                                    <div class="card card-outline card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Menu Structure</h3>
                                            <div class="card-tools">
                                                <button class="btn btn-sm btn-primary" id="storebutton">
                                                    <i class="fas fa-save mr-1"></i> Save Menu
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="min-height: 300px;">
                                            <div id="element-id"></div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Right Column: Add/Edit Form --}}
                                <div class="col-md-4">
                                    <div class="card card-outline card-secondary">
                                        <div class="card-header">
                                            <h3 class="card-title">Add / Edit Item</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="txtText">Link Text</label>
                                                <input type="text" class="form-control" id="txtText"
                                                    placeholder="e.g. About Us">
                                            </div>
                                            <div class="form-group">
                                                <label for="txtHref">URL / Path</label>
                                                <input type="text" class="form-control" id="txtHref"
                                                    placeholder="e.g. /about or https://...">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button id="btnUpdate" class="btn btn-info" disabled>
                                                <i class="fas fa-sync-alt mr-1"></i> Update
                                            </button>
                                            <button id="btnAdd" class="btn btn-primary">
                                                <i class="fas fa-plus mr-1"></i> Add to Menu
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/dashboard/plugins/menu-editor/js/menu-editor.min.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Element References
            const itemTextInput = document.getElementById("txtText");
            const itemHrefInput = document.getElementById("txtHref");
            const updateBtn = document.getElementById("btnUpdate");
            const addBtn = document.getElementById("btnAdd");
            const menuDataInput = document.getElementById("menudata");
            const saveBtn = document.getElementById("storebutton");
            const form = document.getElementById("menuform");

            // Initialize Menu Editor
            // Assuming maxLevel: 0 means flat list (no nesting) which is typical for footers
            const menuEditor = new MenuEditor('element-id', {
                maxLevel: 0
            });

            // Load existing data
            const nestedData = {!! $menu !!};
            menuEditor.setArray(nestedData);
            menuEditor.mount();

            // Clear Form Function
            function clearForm() {
                itemHrefInput.value = "";
                itemTextInput.value = "";
            }

            // Handle Delete
            menuEditor.onClickDelete((event) => {
                if (confirm('Do you want to delete the item: ' + event.item.getDataset().text + '?')) {
                    event.item.remove();
                }
            });

            // Handle Edit Click
            menuEditor.onClickEdit((t) => {
                const dataset = t.item.getDataset();
                itemTextInput.value = dataset.text;
                itemHrefInput.value = dataset.href;

                // Enable update button
                menuEditor.edit(t.item);
                updateBtn.removeAttribute("disabled");
            });

            // Handle Add Button
            addBtn.addEventListener("click", () => {
                if (!itemTextInput.value) {
                    alert("Please enter link text.");
                    return;
                }

                const newItem = {
                    text: itemTextInput.value,
                    href: itemHrefInput.value,
                    icon: "",
                    tooltip: ""
                };

                menuEditor.add(newItem);
                updateBtn.setAttribute("disabled", "true");
                clearForm();
            });

            // Handle Update Button
            updateBtn.addEventListener("click", () => {
                const updatedItem = {
                    text: itemTextInput.value,
                    href: itemHrefInput.value,
                    icon: "",
                    tooltip: ""
                };

                menuEditor.update(updatedItem);
                updateBtn.setAttribute("disabled", "true");
                clearForm();
            });

            // Handle Save/Submit
            saveBtn.addEventListener("click", (e) => {
                e.preventDefault();
                menuDataInput.value = menuEditor.getString();
                form.submit();
            });
        });
    </script>
@endpush
