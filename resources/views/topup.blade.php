<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    @include('components/navbar')
    
    
    <div class="container py-5 h-100">
     
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-xl-10">
            <div class="card rounded-3 text-black">
              <div class="row g-0">
                <div class="col-lg-12">
                  <div class="card-body p-md-5 mx-md-4">
                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Topup</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Transaction History</button>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                    <div class="container tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="col-12 text-center">
                        <h1>Top up</h1>
                    </div>
                    <form action="{{ URL('/topup') }}" method="POST">
                        <div class="container card-body ">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <input name="name" type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-9 mt-2">
                                    <input name="cardnum" type="number" class="form-control" placeholder="card number">
                                </div>
                                <div class="col-3 mt-2">
                                    <input name="CVV" type="number" class="form-control" placeholder="CVV">
                                </div>
                                <div class="col-6 mt-2">
                                    <input name="expiry" type="date" class="form-control" placeholder="expiry">
                                </div>
                                <div class="col-6 mt-2">
                                    <input name="amount" type="number" class="form-control" placeholder="Amount">
                                </div>
                                <div class="col-3 m-auto text-center">
                                    <button type="submit" class="btn btn-success mt-2">Topup</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="container card-body tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <div class="container">
                        <h1>Transaction history</h1>
                      </div>
                      <div class="container">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Status</th>
                              <th>Description</th>
                              <th>Amount</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach(Auth::user()->wallet->transactions as $transaction)
                            <tr>
                              <td> {{$loop->iteration}} </td>
                              <td> {{$transaction->status}} </td>
                              <td> {{$transaction->description}} </td>
                              <td> {{$transaction->amount}} </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
</body>
</html>
