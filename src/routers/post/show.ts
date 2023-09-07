import { Router, Request, Response, NextFunction } from "express";
import Post from '../../models/post'

const router = Router()

router.post('/api/show/post/:id', async (req: Request, res: Response, next: NextFunction) => {
    const { id } = req.params;

    if (!id) {
        const allPosts = await Post.find()
        res.status(200).send(allPosts)
    }
    const post = await Post.findOne({_id : id}).populate('comments')
    res.status(200).send(post)
    // const result = id ? await Post.findById(id) : await Post.find()

    // res.status(201).send(result)

})

export { router as showPostRouter }
