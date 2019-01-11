package com.example.fajar.uas_mobile_bisnis_final.api;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class RetroServer {
    private  static  final  String BASE_URL = "http://192.168.43.79/prj_uas/";
    private static Retrofit retrofit;

    public  static Retrofit getClient(){
        if (retrofit == null){
            retrofit = new Retrofit.Builder()
                    .baseUrl(BASE_URL)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }
        return retrofit;
    }
}
