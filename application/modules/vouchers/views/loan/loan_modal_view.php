

<div class="modal fade" id="loan_search_modal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" id="close_btn" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Loan Detail</h4>
        </div>
        <div class="modal-body">

              <form action="" id="loan_search_form" class="form-horizontal">
                   
                      <table class="table table-bordered table-striped table-condensed" id="LoanSearchTable">
                        <th>#</th>
                        <th>Loan Id</th>
                        <th>Member Name</th>
                        
                        <th>Loan Amount</th>
                        <th>Loan Unpaid</th>
                        <th>No. of Installment</th>
                        <th>No of Installment Paid</th>
                        <th>scheme name</th>
                        
                        <tr>
                       
                        </tr>
                      </table>
                  <div class="col-md-2">
                    <input type="button" id="add_loan_id" class="btn btn-primary" value="Add"
                    data-toggle="tooltip" title="Add" >
                  </div>
                    <input type="button" class="btn btn-warning" value="Close" data-dismiss="modal">
             </form>

        </div>

      </div>

     </div>
  </div>
