<div class="modal fade" id="report-partner" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Relatório</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-right">Data inicial:</label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                            <label class="col-lg-2 col-form-label text-right">Data final:</label>
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <input type="date" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-right">Empresa:</label>
                            <div class="col-lg-3">
                                <select class="form-control" id="exampleSelectd">
                                    <option>Todas</option>
                                </select>
                                <span class="form-text text-muted">Please enter your full name</span>
                            </div>
                            <label class="col-lg-2 col-form-label text-right">Clínicas:</label>
                            <div class="col-lg-3">
                                <select class="form-control" id="exampleSelectd">
                                    <option>Todas</option>
                                </select>
                                <span class="form-text text-muted">Please enter your contact number</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label text-right">Group:</label>
                            <div class="col-lg-3">
                                <div class="radio-inline">
                                    <label class="radio radio-solid">
                                        <input type="radio" name="example_2" checked="checked" value="2" />
                                        <span></span>
                                        Sales Person
                                    </label>
                                    <label class="radio radio-solid">
                                        <input type="radio" name="example_2" value="2" />
                                        <span></span>
                                        Customer
                                    </label>
                                </div>
                                <span class="form-text text-muted">Please select user group</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold">Save changes</button>
            </div>
        </div>
    </div>
</div>
