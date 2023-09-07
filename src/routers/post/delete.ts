import { Router, Request, Response, NextFunction } from "express";
import Post from '../../models/post'

const router = Router()

router.post('/api/delete/post/:id', async (req: Request, res: Response, next: NextFunction) => {
    const { id } = req.params;

    if(!id) {
        const error = new Error('post id is required') as CustomError 
        error.status = 400
        next(error)
    }

    await Post.findOneAndRemove({ _id: id })

    res.status(201).json({ success: true })

})

export { router as deletePostRouter }