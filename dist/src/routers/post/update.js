"use strict";
// import { Router, Request, Response, NextFunction } from "express";
// import Post from '../../models/post'
// const router = Router()
// router.post('/api/update/post/:id', async (req: Request, res: Response, next: NextFunction) => {
//     const { title, content } = req.body;
//     const { id } = req.params
//     if(!title || !content || !id) {
//         const error = new Error('title, content and id are required') as CustomError 
//         error.status = 400
//         next(error)
//     }
//     const newPost = await Post.findOneAndUpdate({ _id: id }, {
//         $set: { title, content }
//     }, { new: true })
//     res.status(201).send(newPost)
// })
// export { router as updatePostRouter }
