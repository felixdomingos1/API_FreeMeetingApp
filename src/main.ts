import { json, urlencoded } from "body-parser";
import express from "express";
import mongoose from "mongoose";
const app = express()

app.use(urlencoded({
   extended: true
}))
app.use(json())

const start = async () =>{
  if (!process.env.Mongo_URI) throw new Error('Mongo_URI is require')
  
  try {
    await mongoose.connect(process.env.Mongo_URI)
  } catch (error) {
      throw new Error("Error in yout App");
  }
  app.listen(8080, () => console.log('My Api is runnig 0n p0rt 1234')) 
}
start()