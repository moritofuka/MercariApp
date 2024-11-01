売上履歴

@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">


    <body>

        <!-- Navigation-->
      
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">売上履歴</h1>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                        <table class='table'>
                       
                            <!-- Product image-->
                          
                            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                        <table class='table'>
                        @foreach($purchases as $purchase)
                
                            <!-- Product image-->
                          
                            <thead>
                            <tr>
                     
                         
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <tr><h5 class="fw-bolder">商品名:{{$purchase->registration['name']}}</h5></th>
                                    <tr><h5 class="fw-bolder">価格:{{$purchase->registration['amount']}}</h5></th>
                                    <tr><h5 class="fw-bolder">購入日時:{{$purchase['created_at']}}</h5></th>
                                </div>
                            </div>
                            </tr>
                            </thead>

                        
                
                            @endforeach
                    
                            </table>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

