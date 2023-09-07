import * as dotenv from 'dotenv'
dotenv.config();

import { json, urlencoded } from "body-parser";
import express, {Request, Response, NextFunction} from "express";
import mongoose from "mongoose";
import  cors  from "cors";
import { 
  newPostRouter,
  deletePostRouter,
  updatePostRouter,
  showPostRouter,
  deleteCommentRouter,
  newCommentRouter

 } from "./routers";

const app = express()
app.use(cors({
  origin:'*',
  optionsSuccessStatus: 200
}))
app.use(urlencoded({
   extended: true
}))
app.use(json())

app.use(newPostRouter)
app.use(showPostRouter)
app.use(updatePostRouter)
app.use(deletePostRouter)

app.use(newCommentRouter)
app.use(deleteCommentRouter)

app.all('*', (req, res, next) =>{
  const error = new Error("Not found") as CustomError
  error.status = 404
  next(error)
  
})

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
      throw new Error("Error in your App");
  }
  app.listen(8080, () => console.log('My Api is runnig on port 8080')) 
}
start()