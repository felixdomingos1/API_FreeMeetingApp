import * as dotenv from 'dotenv'
dotenv.config();

import { json, urlencoded } from "body-parser";
import express, {Request, Response, NextFunction} from "express";
import mongoose from "mongoose";
const app = express()

app.use(urlencoded({
   extended: true
}))
app.use(json())

declare global{
  interface CustomError extends Error{
    status?:number
  }
}
app.use((error:CustomError, req:Request, res:Response, next:NextFunction)=>{
  if (error.status) {
    return res.status(error.status).json({ message: error.message })
  }
  res.status(500).json({ message: 'something went wrong' })
})


const start = async () =>{
  if (!process.env.Mongo_URI) throw new Error('Mongo_URI is require')
  
  try {
    await mongoose.connect(process.env.Mongo_URI)
  } catch (error) {
      throw new Error("Error in yout App");
  }
  app.listen(8080, () => console.log('My Api is runnig 0n p0rt 8080')) 
}
start()