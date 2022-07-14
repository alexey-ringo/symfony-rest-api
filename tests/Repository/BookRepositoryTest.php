<?php

namespace App\Tests\Repository;

use App\Entity\Book;
use App\Entity\BookCategory;
use App\Repository\BookRepository;
use App\Tests\AbstractRepositoryTest;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

class BookRepositoryTest extends AbstractRepositoryTest
{
    private BookRepository $bookRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bookRepository = $this->getRepositoryForEntity(Book::class);
    }

    public function testFindBooksByCategoryId()
    {
        $deviceCategory = (new BookCategory())->setTitle('Devices')->setSlug('devices');
        $this->em->persist($deviceCategory);

        for ($i = 0; $i < 5; $i++) {
            $book = $this->createBook('device-' . $i, $deviceCategory);
            $this->em->persist($book);
        }
        $this->em->flush();

        $this->assertCount(5, $this->bookRepository->findBooksByCategoryId($deviceCategory->getId()));
    }

    private function createBook(string $title, BookCategory $category): Book
    {
        return (new Book())
            ->setPublicationDate(new DateTime())
            ->setAuthors(['author'])
            ->setMeap(false)
            ->setSlug($title)
            ->setCategories(new ArrayCollection([$category]))
            ->setTitle($title)
            ->setImage('http://localgost/' . $title . '.png');
    }
}
