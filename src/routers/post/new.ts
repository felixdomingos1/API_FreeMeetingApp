import { Router, Request, Response, NextFunction } from "express";
import Post from '../../models/post'

const router = Router()

router.post('/api/new/post', async (req: Request, res: Response, next: NextFunction) => {
    const { title, content } = req.body;

    if(!title || !content){
        const error = new Error('title and content are required') as CustomError 
        error.status = 400
        next(error)
    }
    
    const newPost = new Post({
        content,
        title,
    })

    await newPost.save()

    res.status(201).send(newPost)

})

export { router as newPostRouter }